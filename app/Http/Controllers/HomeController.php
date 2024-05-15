<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\Car;
use App\Models\Forum;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Responses\BaseResponse;

class HomeController extends Controller
{
    public function viewHomePage()
    {
        $forumData = Forum::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $carData = Car::where('status', 'Approved')
            ->orderBy('year', 'desc')
            ->orderBy('price_cash', 'asc')
            ->paginate(9);
        return view('home', compact('carData', 'forumData'));
    }

}
