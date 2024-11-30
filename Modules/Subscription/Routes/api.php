<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Subscription\Http\Controllers\ItemController;
use Modules\Subscription\Http\Controllers\SubscriptionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('item')->group(function () {
        Route::get('/', [ItemController::class, 'index']);
        Route::post('/', [ItemController::class, 'store']);
        Route::get('{id}', [ItemController::class, 'show']);
        Route::post('{id}', [ItemController::class, 'update']);
        Route::delete('{id}', [ItemController::class, 'destroy']);
    });


    Route::prefix('subscription')->group(function () {
        Route::get('/', [SubscriptionController::class, 'index']);
        Route::post('/', [SubscriptionController::class, 'store']);
        Route::get('{id}', [SubscriptionController::class, 'show']);
        Route::post('{id}', [SubscriptionController::class, 'update']);
        Route::delete('{id}', [SubscriptionController::class, 'destroy']);
    });
});

