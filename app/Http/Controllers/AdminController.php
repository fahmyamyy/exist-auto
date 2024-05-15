<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helpers;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\Car;
use App\Models\Forum;
use App\Models\Transaction;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Responses\BaseResponse;

class AdminController extends Controller
{
    public function viewDashboard()
    {
        $forumData = Forum::orderBy('created_at', 'desc')
            ->paginate(10);

        $carData = Car::where('status', 'Approved')
            ->orderBy('year', 'desc')
            ->orderBy('price_cash', 'asc')
            ->paginate(9);
        return view('admin.dashboard', compact('carData', 'forumData'));
    }

    public function viewAllUsers()
    {
        $dataUsers = User::where('role', 'USER')
            ->orderBy('name')
            ->paginate(5);

        return view('admin.users.index', compact('dataUsers'));
    }

    public function viewUserDetails($userId)
    {
        $user = User::findOrFail($userId);

        return view('admin.users.detail', compact('user'));
    }

    public function viewAllForums()
    {
        $forumData = Forum::orderBy('created_at')
            ->paginate(5);

        return view('admin.forums.index', compact('forumData'));
    }

    public function viewForumDetails($forumId)
    {
        $forum = Forum::findOrFail($forumId);

        return view('admin.forums.detail', compact('forum'));
    }

    public function viewAllTransactions()
    {
        $transactionData = Transaction::orderBy('created_at', 'asc')
            ->paginate(10);
        return view('admin.transactions.index', compact('transactionData'));
    }

    public function viewTransactionDetails($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $upload = Upload::where('parent_id', $transactionId)->first();
        return view('admin.transactions.detail', compact('transaction', 'upload'));
    }

    public function viewAllCars()
    {
        $carData = Car::orderBy('created_at', 'desc')
            ->paginate(5);
        return view('admin.cars.index', compact('carData'));
    }

    public function viewCarDetails($carId)
    {
        $carBrands = CarBrand::all();
        $uploads = Upload::where('parent_id', $carId)
            ->orderBy('created_at', 'asc')
            ->get();
        $carModels = CarModel::with('carType')->get();
        $car = Car::findOrFail($carId);
        return view('admin.cars.detail', compact('car', 'carBrands', 'carModels', 'uploads'));
    }

    public function viewAppointmentsCars()
    {
        $carData = Car::where('status', 'Pending')
            ->orderBy('created_at', 'asc')
            ->paginate(10);
        return view('admin.cars.appointments', compact('carData'));
    }

    public function viewApprovalsCars()
    {
        $carData = Car::where('status', 'On Progress')
            ->orderBy('created_at', 'asc')
            ->paginate(10);
        return view('admin.cars.approvals', compact('carData'));
    }

    public function getAdminBaseData()
    {
        try {
            $statusCounts = Car::select('status', DB::raw('count(*) as total'))
                ->whereIn('status', ['Pending', 'Approved', 'On Progress'])
                ->groupBy('status')
                ->get()
                ->keyBy('status');

            $pendingCars = $statusCounts['Pending']->total ?? 0;
            $onProgressCars = $statusCounts['On Progress']->total ?? 0;

            $data = [
                'pendingCars' => $pendingCars,
                'onProgressCars' => $onProgressCars
            ];
        } catch (Exception $e) {
            return BaseResponse::errorResponse($e->getMessage());
        }

        return BaseResponse::successResponseData("Success Fetch Base Data!", $data);
    }

    public function updateUserDetails(Request $request, $userId)
    {
        try {

            $user = User::findOrFail($userId);
            $user->name = $request->name;
            $user->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to Update User Details: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Successfully Update User Details!');
    }

    public function updateForumDetails(Request $request, $forumId)
    {
        try {

            $forum = Forum::findOrFail($forumId);
            $forum->title = $request->title;
            $forum->content = $request->content;
            $forum->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to Update Forum Details: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Successfully Update Forum Details!');
    }



    public function updateTransactionDetails(Request $request, $transactionId)
    {
        try {
            $transaction = Transaction::findOrFail($transactionId);
            $transaction->status = $request->action;
            $transaction->save();

            if ($transaction->status === 'Waiting for Approval Seller') {
                $car = Car::findOrFail($transaction->car_id);
                $car->status = $request->action;
                $car->save();
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed Update Transaction: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Successfully Update Transaction!');
    }

    public function updateCarInspection(Request $request, $carId)
    {
        try {
            $updatedCar = Car::findOrFail($carId);
            $cleanMielage = preg_replace('/\D/', '', $request->mileage);

            $updatedCar->car_model_id = $request->model;
            $updatedCar->year = $request->year;
            $updatedCar->transmission = $request->transmission;
            $updatedCar->color = $request->color;
            $updatedCar->location = $request->location;
            $updatedCar->mileage = $cleanMielage;
            $updatedCar->status = $request->status;
            $updatedCar->inspection_date = $request->inspectionDate;

            $updatedCar->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed Create Car Appointments: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Car Inspection Scheduled!');
    }

    public function updateCarDetails(Request $request, $carId)
    {
        try {
            $updatedCar = Car::findOrFail($carId);
            $cleanPriceCash = preg_replace('/\D/', '', $request->priceCash);
            $cleanPriceCredit = preg_replace('/\D/', '', $request->priceCredit);
            $cleanMielage = preg_replace('/\D/', '', $request->mileage);
            $helpers = new Helpers();
            $priceInstallment = $helpers->processPrice(intval($cleanPriceCredit));

            $updatedCar->car_model_id = $request->model;
            $updatedCar->year = $request->year;
            $updatedCar->transmission = $request->transmission;
            $updatedCar->color = $request->color;
            $updatedCar->location = $request->location;
            $updatedCar->price_cash = intval($cleanPriceCash);
            $updatedCar->price_credit = intval($cleanPriceCredit);
            $updatedCar->price_installment = $priceInstallment;
            $updatedCar->mileage = $cleanMielage;
            if ($request->status) {
                $updatedCar->status = $request->status;
            }

            $updatedCar->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to Update Car: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Successfully Update Car!');
    }


    public function deleteUser($userId)
    {
        try {

            $user = User::findOrFail($userId);
            $user->delete();
        } catch (Exception $e) {
            session()->flash('error', 'Error deleting user: ' . $e->getMessage());
            return BaseResponse::errorResponse($e->getMessage());
        }
        session()->flash('success', 'Success Delete User!');
        return BaseResponse::successResponse("Success Delete User!");
    }

    public function deleteForum($forumId)
    {
        try {
            $forum = Forum::findOrFail($forumId);
            $forum->delete();
        } catch (Exception $e) {
            session()->flash('error', 'Error deleting Forum: ' . $e->getMessage());
            return BaseResponse::errorResponse($e->getMessage());
        }
        session()->flash('success', 'Success Delete Forum!');
        return BaseResponse::successResponse("Success Delete Forum!");
    }



    public function uploadCarPhotos(Request $request, $carId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fileInput.*' => 'image|mimes:jpeg,png,jpg|max:1024', // Max size: 1MB
            ]);
            DB::beginTransaction();
            $car = Car::findOrFail($request->carId);

            if ($request->hasFile('fileInput')) {
                $uploadController = new UploadController();
                $newPhoto = $uploadController->uploadPhoto($request, $car->id);
                $responseData = json_decode($newPhoto->getContent(), true);

                if ($responseData['responseCode'] != '200') {
                    return redirect()->back()->with('error', 'Failed Upload Car Photos!');
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to Upload Car Photos!: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Successfully Upload Car Photos!');
    }
}
