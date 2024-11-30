<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Padge\Http\Controllers\PadgeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('padge')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PadgeController::class, 'index']);
    Route::post('/', [PadgeController::class, 'store']);
    Route::get('{id}', [PadgeController::class, 'show']);
    Route::post('{id}', [PadgeController::class, 'update']);
    Route::delete('{id}', [PadgeController::class, 'destroy']);
});
