<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\CreateUser\Http\Controllers\CreateUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('create_user')->group(function () {
    Route::get('/', [CreateUserController::class, 'index']);
    Route::post('/', [CreateUserController::class, 'store']);
    Route::get('{id}', [CreateUserController::class, 'show']);
    Route::post('{id}', [CreateUserController::class, 'update']);
    Route::delete('{id}', [CreateUserController::class, 'destroy']);
});

