<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Position\Http\Controllers\PositionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('position')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PositionController::class, 'index']);
    Route::post('/', [PositionController::class, 'store']);
    Route::get('{id}', [PositionController::class, 'show']);
    Route::post('{id}', [PositionController::class, 'update']);
    Route::delete('{id}', [PositionController::class, 'destroy']);
});
