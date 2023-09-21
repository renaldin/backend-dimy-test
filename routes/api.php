<?php

use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer/store', [CustomerController::class, 'store']);
Route::get('/customer/edit/{id}', [CustomerController::class, 'detail']);
Route::get('/customer/{id}', [CustomerController::class, 'detail']);
Route::put('/customer/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/delete/{id}', [CustomerController::class, 'delete']);
// product
Route::get('/product', [ProductController::class, 'index']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/edit/{id}', [ProductController::class, 'detail']);
Route::get('/product/{id}', [ProductController::class, 'detail']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/delete/{id}', [ProductController::class, 'delete']);
// payment method
Route::get('/payment-method', [PaymentMethodController::class, 'index']);
Route::post('/payment-method/store', [PaymentMethodController::class, 'store']);
Route::get('/payment-method/edit/{id}', [PaymentMethodController::class, 'detail']);
Route::get('/payment-method/{id}', [PaymentMethodController::class, 'detail']);
Route::put('/payment-method/{id}', [PaymentMethodController::class, 'update']);
Route::delete('/payment-method/delete/{id}', [PaymentMethodController::class, 'delete']);
// customer address
Route::get('/customer-address', [CustomerAddressController::class, 'index']);
Route::post('/customer-address/store', [CustomerAddressController::class, 'store']);
Route::get('/customer-address/edit/{id}', [CustomerAddressController::class, 'detail']);
Route::get('/customer-address/{id}', [CustomerAddressController::class, 'detail']);
Route::put('/customer-address/{id}', [CustomerAddressController::class, 'update']);
Route::delete('/customer-address/delete/{id}', [CustomerAddressController::class, 'delete']);
// order
Route::get('/order', [OrderController::class, 'index']);
Route::post('/order/store', [OrderController::class, 'store']);
Route::get('/order/{id}', [OrderController::class, 'detail']);
Route::delete('/order/delete/{id}', [OrderController::class, 'delete']);
// order detail
Route::get('/order-detail', [OrderDetailController::class, 'index']);
Route::post('/order-detail/store', [OrderDetailController::class, 'store']);
Route::get('/order-detail/{id}', [OrderDetailController::class, 'detail']);
Route::delete('/order-detail/delete/{id}', [OrderDetailController::class, 'delete']);
