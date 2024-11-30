<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Statistic\Http\Controllers\StatisticController;
use Modules\Statistic\Http\Controllers\StatisticUserCoinController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('statistic')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [StatisticController::class, 'index']);
    Route::post('/', [StatisticController::class, 'store']);
    Route::get('{id}', [StatisticController::class, 'show']);
    Route::post('{id}', [StatisticController::class, 'update']);
    Route::delete('{id}', [StatisticController::class, 'destroy']);
});


    Route::get('/statistic_user_coin', [StatisticUserCoinController::class, 'show_all'])->middleware('auth:sanctum');
    Route::get('/total_coin', [StatisticUserCoinController::class, 'total_coin'])->middleware('auth:sanctum');



