<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\StepsToBeUnique\Http\Controllers\StepsToBeUniqueController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('steps_to_be_unique')->group(function () {
    Route::get('/', [StepsToBeUniqueController::class, 'index']);
    Route::post('/', [StepsToBeUniqueController::class, 'store']);
    Route::get('{id}', [StepsToBeUniqueController::class, 'show']);
    Route::post('{id}', [StepsToBeUniqueController::class, 'update']);
    Route::delete('{id}', [StepsToBeUniqueController::class, 'destroy']);
});
