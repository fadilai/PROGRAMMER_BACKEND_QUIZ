<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\PaymentMethodsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('/')->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::post('products', [ProductController::class, 'store']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);

    
    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('customersaddress', [CustomerController::class, 'gabung']);
    Route::post('customers', [CustomerController::class, 'store']);
    Route::delete('customers/{id}', [CustomerController::class, 'destroy']);

    Route::get('customer-address/{customer_id}', [CustomerAddressController::class, 'index']);
    Route::post('customer-address', [CustomerAddressController::class, 'store']);
    Route::delete('customers-address/{id}', [CustomerAddressController::class, 'destroy']);

    Route::get('payment-methods', [PaymentMethodsController::class, 'index']);
    Route::post('payment-methods', [PaymentMethodsController::class, 'store']);
    Route::delete('payment-methods/{id}', [PaymentMethodsController::class, 'destroy']);

});



