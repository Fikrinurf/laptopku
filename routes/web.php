<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Buyer\ProductController as BuyerProductController;
use App\Http\Controllers\Buyer\SliderController as BuyerSliderController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Seller\DataBrandController;
use App\Http\Controllers\Seller\DataProcessorController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\SliderController;
use App\Http\Controllers\Seller\UserManagementController;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginRegisterController::class, 'index'])->name('login');
    Route::post('/login', [LoginRegisterController::class, 'login']);
});


Route::get('/home', function () {
    return redirect('/seller/product');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('/seller/data-processor', DataProcessorController::class)->middleware('userAkses:seller');

    Route::resource('/seller/data-brand', DataBrandController::class)->middleware('userAkses:seller');

    Route::resource('/seller/user-management', UserManagementController::class)->only('index', 'destroy')->middleware('userAkses:seller');

    Route::resource('/seller/slider', SliderController::class)->middleware('userAkses:seller');

    Route::resource('/seller/product', ProductController::class)->middleware('userAkses:seller');


    Route::get('/product', [BuyerProductController::class, 'index'])->middleware('userAkses:buyer');
    Route::get('/product/{id}', [BuyerProductController::class, 'show'])->middleware('userAkses:buyer');
    Route::get('/slider', [BuyerSliderController::class, 'slider'])->middleware('userAkses:buyer');

    Route::get('/logout', [LoginRegisterController::class, 'logout']);
});
