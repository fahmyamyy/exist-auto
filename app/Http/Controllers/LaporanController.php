<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pinjaman;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

use Exception;

class LaporanController extends Controller
{
    // public function getDashboardData()
    // {
    //     try {
    //         $user = Auth::user();

    //         if ($user === 'ADMIN') {
    //             $statusPinjaman = [
    //                 'pending' => Pinjaman::where('status', 'PENDING')->count(),
    //                 'onGoing' => Pinjaman::where('status', 'ON GOING')->count(),
    //                 'paid' => Pinjaman::where('status', 'PAID')->count(),
    //                 'rejected' => Pinjaman::where('status', 'REJECTED')->count(),
    //             ];

    //             $statusTagihan = [
    //                 'waiting' => Tagihan::where('status', 'WAITING FOR PAYMENT')->count(),
    //                 'onProcess' => Tagihan::where('status', 'ON PROCESS')->count(),
    //                 'paid' => Tagihan::where('status', 'PAID')->count(),
    //                 'rejected' => Tagihan::where('status', 'REJECTED')->count(),
    //             ];

    //             $data = [
    //                 'statusPinjaman' => $statusPinjaman,
    //                 'statusTagihan' => $statusTagihan
    //             ];

    //         } else {
    //             $statusPinjaman = [
    //                 'pending' => Pinjaman::where('user_id', $user->id)
    //                     ->where('status', 'PENDING')
    //                     ->count(),
    //                 'onGoing' => Pinjaman::where('user_id', $user->id)
    //                     ->where('status', 'ON GOING')
    //                     ->count(),
    //                 'paid' => Pinjaman::where('user_id', $user->id)
    //                     ->where('status', 'PAID')
    //                     ->count(),
    //                 'rejected' => Pinjaman::where('user_id', $user->id)
    //                     ->where('status', 'REJECTED')
    //                     ->count(),
    //             ];

    //             $statusTagihan = [
    //                 'waiting' => Tagihan::whereHas('pinjaman', function ($query) use ($user) {
    //                     $query->where('user_id', $user->id);
    //                 })
    //                     ->whereIn('status', 'WAITING FOR PAYMENT')
    //                     ->count(),
    //                 'pending' => Tagihan::whereHas('pinjaman', function ($query) use ($user) {
    //                     $query->where('user_id', $user->id);
    //                 })
    //                     ->whereIn('status', 'PENDING')
    //                     ->count(),
    //                 'onProcess' => Tagihan::whereHas('pinjaman', function ($query) use ($user) {
    //                     $query->where('user_id', $user->id);
    //                 })
    //                     ->whereIn('status', 'ON PROCESS')
    //                     ->count(),
    //                 'paid' => Tagihan::whereHas('pinjaman', function ($query) use ($user) {
    //                     $query->where('user_id', $user->id);
    //                 })
    //                     ->whereIn('status', 'PAID')
    //                     ->count(),
    //                 'rejected' => Tagihan::whereHas('pinjaman', function ($query) use ($user) {
    //                     $query->where('user_id', $user->id);
    //                 })
    //                     ->whereIn('status', 'REJECTED')
    //                     ->count(),
    //             ];

    //             $data = [
    //                 'statusPinjaman' => $statusPinjaman,
    //                 'statusTagihan' => $statusTagihan
    //             ];
    //         }
    //     }
    // }
    public function getDashboardData()
{
    try {
        $user = Auth::user();
        $isAdmin = $user->role === 'ADMIN';

        $statusPinjaman = [
            'pending' => Pinjaman::where('status', 'PENDING')->when(!$isAdmin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count(),
            'onGoing' => Pinjaman::where('status', 'ON GOING')->when(!$isAdmin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count(),
            'paid' => Pinjaman::where('status', 'PAID')->when(!$isAdmin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count(),
            'rejected' => Pinjaman::where('status', 'REJECTED')->when(!$isAdmin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->count(),
        ];

        $statusTagihan = [
            'pending' => Tagihan::where('status', 'PENDING')->when(!$isAdmin, function ($query) use ($user) {
                $query->whereHas('pinjaman', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
            })->count(),
            'waiting' => Tagihan::where('status', 'WAITING FOR PAYMENT')->when(!$isAdmin, function ($query) use ($user) {
                $query->whereHas('pinjaman', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
            })->count(),
            'onProcess' => Tagihan::where('status', 'ON PROCESS')->when(!$isAdmin, function ($query) use ($user) {
                $query->whereHas('pinjaman', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
            })->count(),
            'paid' => Tagihan::where('status', 'PAID')->when(!$isAdmin, function ($query) use ($user) {
                $query->whereHas('pinjaman', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
            })->count(),
            'rejected' => Tagihan::where('status', 'REJECTED')->when(!$isAdmin, function ($query) use ($user) {
                $query->whereHas('pinjaman', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
            })->count(),
        ];

        $data = [
            'statusPinjaman' => $statusPinjaman,
            'statusTagihan' => $statusTagihan,
        ];

        return response()->json(['data' => $data]); // Ensure the response is in this format
    } catch (Exception $e) {
        // Handle exceptions here
        // Log::error('Error fetching dashboard data: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred while fetching dashboard data.'], 500);
    }
}



    public function getDataLaporan(Request $request)
    {
        $user = Auth::user();

        // Get filter values from the request
        $month = $request->input('month');
        $year = $request->input('year');
        // $status = $request->input('status');

        // Query builder for pinjaman
        $query = Tagihan::query();


        if ($month) {
            $query->whereMonth('created_at', $month);
        }

        if ($year) {
            $query->whereYear('created_at', $year);
        }

        // if ($status) {
        $query->where('status', 'PAID');
        // }

        // Order by created_at and paginate
        // $dataPinjamans = $query->orderBy('created_at', 'desc')->paginate(5);
        $dataTagihans = $query->orderBy('status', 'DESC')->paginate(10);

        return view('laporan.index', compact('dataTagihans'));
    }

    // public function getAllPaidTagihan(Request $request)
    // {
    //     $dataTagihans = Tagihan::where('status', 'PAID')
    //         ->orderBy('updated_at', 'DESC')
    //         ->paginate(10);
    //     return view('laporan.index', compact('dataTagihans'));
    // }




    /**
     * Show the form for creating a new resource.
     */
    public function detailLaporan($pinjamanId)
    {
        try {
            $pinjaman = Pinjaman::findOrFail($pinjamanId);
            $dataTagihans = Tagihan::where('pinjaman_id', $pinjaman->id)
                // ->whereIn('status', ['WAITING FOR PAYMENT', 'ON PROCESS', 'REJECTED', 'PAID'])
                ->orderBy('angsuran')
                ->orderBy('updated_at')
                ->paginate(10);

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('laporan.detail', compact('pinjaman', 'dataTagihans'));
        // return redirect()->back()->with('success', 'Success ajukan Pinjaman!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }

    // public function printLaporan()
    // {
    //     try {
    //         $dataTagihans = Tagihan::where('status', 'PAID')
    //             ->orderBy('updated_at', 'DESC')
    //             ->get();

    //         $pdf = PDF::loadView('laporan.pdf', ['dataTagihans' => $dataTagihans]);

    //         return $pdf->stream('document.pdf');
    //     } catch (Exception $e) {
    //         return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    //     }
    // }

    public function printLaporan(Request $request)
    {
        try {
            // Get filter values from the request
            $month = $request->input('month');
            $year = $request->input('year');
            $status = $request->input('status');

            // Query builder for Tagihan
            $query = Tagihan::query();

            // Apply filters
            if ($month) {
                $query->whereMonth('updated_at', $month);
            }

            if ($year) {
                $query->whereYear('updated_at', $year);
            }

            if ($status) {
                $query->where('status', $status);
            }

            $dataTagihans = $query->where('status', 'PAID')
                ->orderBy('updated_at', 'DESC')
                ->get();

            // var_dump(!$dataTagihans->isNotEmpty());die();

            if (!$dataTagihans->isNotEmpty()) {
                throw new Exception('Data not found!');
            }

            $pdf = PDF::loadView('laporan.pdf', ['dataTagihans' => $dataTagihans]);

            return $pdf->stream('document.pdf');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


}
