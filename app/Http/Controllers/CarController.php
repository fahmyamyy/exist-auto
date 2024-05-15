<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helpers;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\Car;
use App\Models\Transaction;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;

class CarController extends Controller
{
    public function viewBuyCars(Request $request)
    {
        $query = Car::query()->where('status', 'Approved');

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if (!empty($request->brand)) {
            $query->whereHas('carModel.carBrand', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        }

        if (!empty($request->model)) {
            $query->whereHas('carModel', function ($q) use ($request) {
                $q->where('id', $request->model);
            });
        }

        if (!empty($request->type)) {
            $query->whereHas('carModel.carType', function ($q) use ($request) {
                $q->where('id', $request->type);
            });
        }

        if (!empty($request->transmission)) {
            $query->where('transmission', $request->transmission);
        }

        if (!empty($request->color)) {
            $query->where('color', $request->color);
        }

        if (!empty($request->location)) {
            $query->where('location', $request->location);
        }

        if (!empty($request->yearMin) && !empty($request->yearMax)) {
            $query->whereBetween('year', [$request->yearMin, $request->yearMax]);
        }

        $carData = $query->orderBy('created_at')->paginate(9);
        $this->getCoverPhotos($carData);
        $carBrands = CarBrand::all();
        $carTypes = CarType::all();
        $carModels = CarModel::all();

        return view('cars.buy', compact('carData', 'carBrands', 'carTypes', 'carModels'));
    }

    public function viewSellCars()
    {
        $carBrands = CarBrand::all();
        $carData = Car::where('seller', Auth::user()->id)
            ->orderBy('created_at')
            ->paginate(3);
        return view('cars.sell', compact('carBrands', 'carData'));
    }

    public function viewMyCars()
    {
        $user = Auth::user();

        $transactions = Transaction::where('buyer_id', $user->id)
            ->orderBy('created_at')
            ->paginate(5);
        return view('mycars.index', compact('user', 'transactions'));
    }

    public function viewCarDetails($carId)
    {
        $carRecommendation = Car::where('status', 'Approved')
            ->orderBy('year', 'desc')
            ->orderBy('price_cash', 'asc')
            ->paginate(9);

        $car = Car::findOrFail($carId);
        $photos = $this->getAndSetCarPhotos($car->id);
    
        return view('cars.detail', compact('car', 'carRecommendation', 'photos'));
    }

    public function viewMyCarsTransactionDetail($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $upload = Upload::where('parent_id', $transaction->id)->first();
        return view('mycars.detail', compact('transaction', 'upload'));
    }

    public function viewCheckoutPage($carId)
    {
        $car = Car::findOrFail($carId);
        return view('cars.checkout', compact('car'));
    }

    public function getModelsByBrand($brandId)
    {
        $models = CarModel::where('car_brand_id', $brandId)->with('carType')->get();
        return response()->json($models);
    }

    public function getTypesByModel($modelId)
    {
        $type = CarType::where('models', function ($query) use ($modelId) {
            $query->where('id', $modelId);
        })->get();
        return response()->json($type);
    }

    public function sendCar(Request $request)
    {
        try {
            $car = Car::findOrFail($request->carId);
            $car->status = 'Sold';
            $car->save();

            $transaction = Transaction::where('car_id', $request->carId)
                ->where('status', 'Waiting for Approval Seller')
                ->first();
            $transaction->status = 'Purchased';
            $transaction->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to send car: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Car Sold!');
    }


    public function sellCar(Request $request)
    {
        try {
            $cleanNumber = preg_replace('/\D/', '', $request->mileage);
            $newCars = Car::create([
                'id' => Str::uuid(),
                'car_model_id' => $request->model,
                'year' => $request->year,
                'transmission' => $request->transmission,
                'color' => $request->color,
                'location' => $request->location,
                'mileage' => intval($cleanNumber),
                'status' => 'Pending',
                'seller' => Auth::user()->id
            ]);
            $newCars->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to sell car: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Car Listing Successfully!');
    }

    public function checkout(Request $request)
    {
        try {
            $car = Car::findOrFail($request->carId);
            $transaction = Transaction::where([
                ['car_id', '=', $car->id],
                ['buyer_id', '>=', Auth::user()->id]
            ])
                ->orderBy('created_at', 'desc')
                ->first();

            if ($transaction && $transaction->status != 'Rejected') {
                return redirect()->route('mycars')->with('error', 'You already checkout this car!');
            }

            if ($request->transactionType === 'Cash') {
                $amount = preg_replace('/\D/', '', $car->price_cash);
            } else {
                $helpers = new Helpers();
                $amount = $helpers->convertInstallment($car->price_installment);
            }

            $newTransaction = Transaction::create([
                'id' => Str::uuid(),
                'car_id' => $car->id,
                'buyer_id' => Auth::user()->id,
                'amount' => intval($amount),
                'recipient' => $request->name,
                'address' => $request->address,
                'status' => 'Waiting for Payment',
                'transaction_type' => $request->transactionType
            ]);
            $newTransaction->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to buy car: ' . $e->getMessage());
        }
        return redirect()->route('mycars')->with('success', 'Successfully Checkout a Car!');
    }

    public function cancelProcessCar(Request $request)
    {
        try {
            $car = Car::findOrFail($request->carId);
            $car->delete();
        } catch (Exception $e) {
            return redirect()->route('car.sell.view')->with('error', 'Failed to cancel car: ' . $e->getMessage());
        }
        return redirect()->route('car.sell.view')->with('success', 'Car Listing Canceled!');
    }

    public function getCoverPhotos($carData)
    {        
        foreach ($carData as $car) {
            $coverImage = Upload::where('parent_id', $car->id)->orderBy('created_at')->first();
            $car->image = $coverImage;
        }
        return $carData;
    }

    public function getAndSetCarPhotos($carId)
    {
        return Upload::where('parent_id', $carId)->orderBy('created_at')->get();
    }
}
