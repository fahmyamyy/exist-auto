<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

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



// Require user login
Route::middleware(['check.auth'])->group(function () {
    // My Cars
    Route::get('/mycars', [CarController::class, 'viewMyCars'])->name('mycars');
    Route::get('/mycars/{transactionId}', [CarController::class, 'viewMyCarsTransactionDetail'])->name('mycars.transaction');

    // Transactions
    Route::post('/transaction/upload', [TransactionController::class, 'uploadProof'])->name('upload.proof');
    Route::delete('/transaction/cancel', [TransactionController::class, 'cancelTransaction'])->name('cancel.transaction');
    Route::delete('/transaction/upload/{uploadId}', [TransactionController::class, 'deleteProof'])->name('delete.proof');

    // Cars
    Route::get('/cars/sell', [CarController::class, 'viewSellCars'])->name('car.sell.view');
    Route::post('/cars/sell', [CarController::class, 'sellCar'])->name('sell');
    Route::post('/cars/checkout', [CarController::class, 'checkout'])->name('checkout');
    Route::get('/cars/checkout/{carId}', [CarController::class, 'viewCheckoutPage'])->name('checkout.view');
    Route::delete('/cars/cancel', [CarController::class, 'cancelProcessCar'])->name('cancel.car');

    // Forums
    Route::post('/comments', [CommentController::class, 'createComment'])->name('create.comment');
});


// Only for admin
Route::middleware(['check.admin'])->group(function () {
    // Dashboard
    Route::get('/admin', [AdminController::class, 'viewDashboard'])->name('admin.dashboard');
    Route::get('/admin/base', [AdminController::class, 'getAdminBaseData']);

    // Transactions
    Route::get('/admin/transactions', [AdminController::class, 'viewAllTransactions'])->name('admin.transactions');
    Route::get('/admin/transactions/{transactionId}', [AdminController::class, 'viewTransactionDetails'])->name('admin.transaction.details');
    Route::put('/admin/transactions/{transactionId}', [AdminController::class, 'updateTransactionDetails'])->name('admin.transaction.update');

    // Users
    Route::get('/admin/users', [AdminController::class, 'viewAllUsers'])->name('admin.users');
    Route::get('/admin/users/{userId}', [AdminController::class, 'viewUserDetails'])->name('admin.users.details');
    Route::put('/admin/users/{userId}', [AdminController::class, 'updateUserDetails'])->name('admin.users.update');
    Route::delete('/admin/users/{userId}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Cars
    Route::get('/admin/cars/appointments', [AdminController::class, 'viewAppointmentsCars'])->name('admin.appointments');
    Route::get('/admin/cars/approvals', [AdminController::class, 'viewApprovalsCars'])->name('admin.approvals');
    Route::get('/admin/cars', [AdminController::class, 'viewAllCars'])->name('admin.cars');
    Route::put('/admin/cars/inspection/{carId}', [AdminController::class, 'updateCarInspection'])->name('admin.cars.inspection');
    Route::put('/admin/cars/{carId}', [AdminController::class, 'updateCarDetails'])->name('admin.cars.update');
    Route::get('/admin/cars/{carId}', [AdminController::class, 'viewCarDetails'])->name('admin.cars.detail');

    // Forums
    Route::get('/admin/forums', [AdminController::class, 'viewAllForums'])->name('admin.forums');
    Route::get('/admin/forums/{forumId}', [AdminController::class, 'viewForumDetails'])->name('admin.forums.details');
    Route::put('/admin/forums/{forumId}', [AdminController::class, 'updateForumDetails'])->name('admin.forums.update');
    Route::delete('/admin/forums/{forumId}', [AdminController::class, 'deleteForum'])->name('admin.forums.delete');

});
// Root
Route::get('/', [HomeController::class, 'viewHomePage'])->name('home');

// Form
Route::get('/get-models/{brandId}', [CarController::class, 'getModelsByBrand']);
Route::get('/get-types/{modelId}', [CarController::class, 'getTypesByModel']);

// Forums
Route::get('/forums', [ForumController::class, 'showForums'])->name('forums');
Route::get('/forums/{forumId}', [ForumController::class, 'viewForumDetails'])->name('forum.detail');
Route::post('/forums', [ForumController::class, 'createPost'])->name('create.forum');

// Cars
Route::get('/cars/buy', [CarController::class, 'viewBuyCars'])->name('car.buy.view');
Route::post('/cars/buy', [CarController::class, 'viewBuyCarsWithQuery']);
Route::post('/cars/search', [CarController::class, 'searchCars'])->name('car.search');
Route::post('/cars/filter', [CarController::class, 'filterCars'])->name('car.filter');
Route::get('/cars/{carId}', [CarController::class, 'viewCarDetails'])->name('car.detail');
Route::post('/cars/send', [CarController::class, 'sendCar'])->name('car.send');

// Auth
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// Upload
Route::delete('uploads/{id}', [UploadController::class, 'deleteUploadById'])->name('delete.upload.id');
Route::post('uploads/car/{carId}', [AdminController::class, 'uploadCarPhotos'])->name('upload.car.photos');