<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Exam\Http\Controllers\AnswerExamController;
use Modules\Exam\Http\Controllers\ExamController;
use Modules\Question\Models\Answer;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('exam')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ExamController::class, 'index']);
    Route::post('/', [ExamController::class, 'store']);
    Route::get('{id}', [ExamController::class, 'show']);
    Route::post('{id}', [ExamController::class, 'update']);
    Route::delete('{id}', [ExamController::class, 'destroy']);
    Route::post('/exam/submit/{examId}', [ExamController::class, 'submitExam'])->middleware('auth:sanctum');
});

Route::prefix('answer')->middleware('auth:sanctum')->group(function () {
    Route::post('/exam', [AnswerExamController::class, 'store']);
});
