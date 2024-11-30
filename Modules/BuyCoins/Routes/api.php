<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\BuyCoins\Http\Controllers\BuyCoinsController;
use Modules\BuyCoins\Http\Controllers\CoinController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('coins')->group(function () {
    Route::get('/', [CoinController::class, 'index']);
    Route::post('/', [CoinController::class, 'store']);
    Route::get('{id}', [CoinController::class, 'show']);
    Route::post('{id}', [CoinController::class, 'update']);
    Route::delete('{id}', [CoinController::class, 'destroy']);
});


Route::prefix('buy_coins')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [BuyCoinsController::class, 'index']);
    Route::post('/', [BuyCoinsController::class, 'store']);
    Route::get('{id}', [BuyCoinsController::class, 'show']);
    Route::post('{id}', [BuyCoinsController::class, 'update']);
    Route::delete('{id}', [BuyCoinsController::class, 'destroy']);
});
