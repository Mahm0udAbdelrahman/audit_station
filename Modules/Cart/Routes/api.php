<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\CartController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('cart')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CartController::class, 'index'])->middleware('permission:view_all_cart');
    Route::post('/', [CartController::class, 'store'])->middleware('permission:create_cart');
     Route::delete('{id}', [CartController::class, 'destroy'])->middleware('permission:delete_cart');
    Route::delete('/', [CartController::class, 'deleteAll'])->middleware('permission:delete_all_cart');

 });
