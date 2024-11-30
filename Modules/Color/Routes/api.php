<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Color\Http\Controllers\ColorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('color')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ColorController::class, 'index']);
    Route::post('/', [ColorController::class, 'store']);
    Route::get('{id}', [ColorController::class, 'show']);
    Route::post('{id}', [ColorController::class, 'update']);
    Route::delete('{id}', [ColorController::class, 'destroy']);
});
