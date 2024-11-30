<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\AccreditationManagement\Http\Controllers\AccreditationManagementController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('accreditation_management')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [AccreditationManagementController::class, 'index']);
    Route::post('/', [AccreditationManagementController::class, 'store']);
    Route::get('{id}', [AccreditationManagementController::class, 'show']);
    Route::post('{id}', [AccreditationManagementController::class, 'update']);
    Route::delete('{id}', [AccreditationManagementController::class, 'destroy']);
});
