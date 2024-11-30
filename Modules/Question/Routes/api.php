<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Question\Http\Controllers\QuestionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('general_question')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])->middleware('permission:view_all_general_questions');
    Route::post('/', [QuestionController::class, 'store'])->middleware('permission:create_general_questions');
    Route::get('{id}', [QuestionController::class, 'show'])->middleware('permission:view_general_questions');
    Route::post('{id}', [QuestionController::class, 'update'])->middleware('permission:update_general_questions');
    Route::delete('{id}', [QuestionController::class, 'destroy'])->middleware('permission:delete_general_questions');
});
