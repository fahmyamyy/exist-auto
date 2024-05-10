<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MobilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home'); });

Route::get('/mobil/beli', function () {
    return view('mobil/beli');
});

// Route::get('/mobil/jual', function () {
//     return view('mobil/jual');
// });

Route::get('/forum', function () {
    return view('forum/forum');
});

Route::get('/mobil/jual', [MobilController::class, 'jual'])->name('jual');
Route::get('/mobil/beli', [MobilController::class, 'beli'])->name('beli');
Route::get('/mobil/detail', [MobilController::class, 'detail'])->name('detail');

// Route::get('/login', function () {
//     return view('forum/forum');
// });

Route::get('register', [AuthenticationController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthenticationController::class, 'register']);
Route::get('login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthenticationController::class, 'login']);
Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');

// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth')->name('home');


Route::middleware(['check.auth'])->group(function () {
    Route::get('/dashboard', function() {
        return view('dashboard');
    });
    // Other routes requiring user to be authenticated
});