<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Permission\Http\Controllers\RoleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('role')->group(function () {
    Route::get('/', [RoleController::class, 'index']);
    Route::post('/', [RoleController::class, 'store']);
    Route::get('{id}', [RoleController::class, 'show']);
    Route::post('{id}', [RoleController::class, 'update']);
    Route::delete('{id}', [RoleController::class, 'destroy']);
});
