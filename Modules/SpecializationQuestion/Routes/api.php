<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\SpecializationQuestion\Http\Controllers\SpecializationQuestionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('specialization_question')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [SpecializationQuestionController::class, 'index'])->middleware('permission:view_all_Specialization_Questions');
    Route::post('/', [SpecializationQuestionController::class, 'store'])->middleware('permission:create_Specialization_Questions');
    Route::get('{id}', [SpecializationQuestionController::class, 'show'])->middleware('permission:view_Specialization_Questions');
    Route::post('{id}', [SpecializationQuestionController::class, 'update'])->middleware('permission:update_Specialization_Questions');
    Route::delete('{id}', [SpecializationQuestionController::class, 'destroy'])->middleware('permission:delete_Specialization_Questions');
});
