<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Responses\BaseResponse;
use Exception;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function uploadProof(Request $request)
    {
        try {
            $request->validate([
                'fileInput' => 'required|file|image|max:2048',
            ]);
            DB::beginTransaction();
            $transaction = Transaction::findOrFail($request->transactionId);
            if ($request->hasFile('fileInput')) {
                $uploadController = new UploadController();
                $newPhoto = $uploadController->uploadPhoto($request, $transaction->id);
                $responseData = json_decode($newPhoto->getContent(), true);

                if ($responseData['responseCode'] != '200') {
                    return redirect()->back()->with('error', 'Failed Upload Payment Proof!');
                }
                $transaction->status = 'Waiting for Approval Admin';
                $transaction->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed Upload Payment Proof!: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Successfully Upload Payment Proof!');
    }

    public function deleteProof(Request $request)
    {
        try {
            $transaction = Transaction::findOrFail($request->transactionId);

            $uploadController = new UploadController();
            $deletePhoto = $uploadController->deleteUploadById($request->uploadId);
            $responseData = json_decode($deletePhoto->getContent(), true);
            if ($responseData['responseCode'] != '200') {
                session()->flash('error', 'Failed Delete Payment Proof!');
                return BaseResponse::errorResponse('Failed Delete Payment Proof!');
            }

            $transaction->status = 'Waiting for Payment';
            $transaction->save();
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return BaseResponse::errorResponse('Failed Delete Payment Proof: ' . $e->getMessage());
        }
        session()->flash('success', 'Success Delete Payment Proof!');
        return BaseResponse::successResponse("Success Delete Payment Proof!");
    }

    public function cancelTransaction(Request $request)
    {
        try {
            $transaction = Transaction::findOrFail($request->transactionId);
            $transaction->status = 'Canceled';
            $transaction->delete();
        } catch (Exception $e) {
            session()->flash('error', 'Failed Cancel Transaction: ' . $e->getMessage());
            return BaseResponse::errorResponse('Failed Cancel Transaction: ' . $e->getMessage());
        }
        session()->flash('success', 'Success Cancel Transaction!');
        return BaseResponse::successResponse("Success Cancel Transaction!");
    }

}
