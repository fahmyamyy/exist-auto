<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;

class PinjamanController extends Controller
{
    public function showCreatePinjamanPage()
    {
        return view('pinjaman.create');
    }

    public function getAllPinjaman(Request $request)
    {
        $user = Auth::user();
        $status = $request->input('status');

        if ($user->role === 'ADMIN') {
            $query = Pinjaman::orderBy('created_at');
        } else {
            $query = Pinjaman::where('user_id', $user->id)
                ->orderBy('created_at', 'desc');
        }

        if ($status) {
            $query->where('status', $status);
        }

        $dataPinjamans = $query->paginate(10);

        return view('pinjaman.index', compact('dataPinjamans'));
    }


    public function createPinjaman(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $cleanPinjaman = preg_replace('/\D/', '', $request->jumlahPinjaman);
            $cleanLimit = preg_replace('/\D/', '', $user->limit);

            if ($cleanLimit < $cleanPinjaman) {
                throw new Exception('Pinjaman anda melebihi limit yang tersedia!');
            }

            $totalPinjaman = $cleanPinjaman * $request->tenor * 0.05;
            $roundedTotalPinjaman = $cleanPinjaman + ceil($totalPinjaman / 1000) * 1000;

            $idPinjaman = Str::uuid();
            $newPinjaman = Pinjaman::create([
                'id' => $idPinjaman,
                'user_id' => Auth::user()->id,
                'nama_pemilik_rekening' => $request->namaPemilikRekening,
                'bank' => $request->bank,
                'no_rek' => $request->noRekening,
                'tenor' => $request->tenor,
                'pinjaman_pokok' => $cleanPinjaman,
                'total_pinjaman' => $roundedTotalPinjaman,
                'status' => 'PENDING'
            ]);
            $newPinjaman->save();

            DB::commit();

            return redirect()->route('pinjaman.detail', ['pinjamanId' => $idPinjaman])->with('success', 'Success ajukan Pinjaman!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to ajukan Pinjaman: ' . $e->getMessage());
        }
    }


    public function updateStatusPinjaman(Request $request, $pinjamanId)
    {
        try {
            $pinjaman = Pinjaman::findOrFail($pinjamanId);
            $pinjaman->status = $request->action;
            $pinjaman->save();

            if ($pinjaman->status === 'APPROVED') {
                $pinjaman->status = 'ON GOING';
                $pinjaman->save();

                $user = $pinjaman->user;
                $user->limit = preg_replace('/\D/', '', $user->limit) - preg_replace('/\D/', '', $pinjaman->pinjaman_pokok);
                $user->save();
                $this->createTagihan($pinjamanId);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to ' . ucfirst(strtolower($request->action)) . ' Pinjaman: ' . $e->getMessage());
        }
        return redirect()->route('pinjaman.detail', ['pinjamanId' => $pinjamanId])->with('success', 'Success ' . ucfirst(strtolower($request->action)) . ' Pinjaman!');
    }

    public function detailPinjaman($pinjamanId)
    {
        try {
            $dataPinjaman = Pinjaman::findOrFail($pinjamanId);
            $dataTagihans = Tagihan::where('pinjaman_id', $dataPinjaman->id)
                ->orderBy('angsuran', 'ASC')
                ->orderBy('updated_at', 'DESC')
                ->paginate(5);

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('pinjaman.detail', compact('dataPinjaman', 'dataTagihans'));
    }

    public function createTagihan($pinjamanId)
    {
        try {
            DB::beginTransaction();
            $pinjaman = Pinjaman::findOrFail($pinjamanId);

            $cleanJumlahPinjaman = preg_replace('/\D/', '', $pinjaman->total_pinjaman);
            $bunga = ceil($cleanJumlahPinjaman * 0.05 / 1000) * 1000;
            $tagihan_pokok = ceil($cleanJumlahPinjaman / $pinjaman->tenor / 1000) * 1000;

            for ($i = 1; $i <= $pinjaman->tenor; $i++) {
                $jatuhTempo = $i === 1 ? Carbon::now()->addMonths(1)->day(27) : null;
                $status = $i === 1 ? 'WAITING FOR PAYMENT' : 'PENDING';
                $newTagihan = Tagihan::create([
                    'id' => Str::uuid(),
                    'pinjaman_id' => $pinjamanId,
                    'angsuran' => $i,
                    'tagihan_pokok' => $tagihan_pokok,
                    'bunga' => $bunga,
                    'tunggakan' => 0,
                    'total_tagihan' => $tagihan_pokok + $bunga,
                    'jatuh_tempo' => $jatuhTempo,
                    'status' => $status
                ]);
                $newTagihan->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
