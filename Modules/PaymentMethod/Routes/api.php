<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\PaymentMethod\Http\Controllers\PaymentMethodController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('payment_method')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PaymentMethodController::class, 'index'])->middleware('permission:view_all_payment');
    Route::post('/', [PaymentMethodController::class, 'store'])->middleware('permission:create_payment');
    Route::get('{id}', [PaymentMethodController::class, 'show'])->middleware('permission:view_payment');
    Route::post('{id}', [PaymentMethodController::class, 'update'])->middleware('permission:update_payment');
    Route::delete('{id}', [PaymentMethodController::class, 'destroy'])->middleware('permission:delete_payment');
});
