<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Service\Http\Controllers\ServiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('service')->group(function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::post('/', [ServiceController::class, 'store']);
    Route::get('{id}', [ServiceController::class, 'show']);
    Route::post('{id}', [ServiceController::class, 'update']);
    Route::delete('{id}', [ServiceController::class, 'destroy']);
});
