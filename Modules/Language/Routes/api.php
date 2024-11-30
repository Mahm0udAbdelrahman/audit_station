<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Language\Http\Controllers\LanguageController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('language')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [LanguageController::class, 'index']) ;
    Route::post('/', [LanguageController::class, 'store']) ;
    Route::get('{id}', [LanguageController::class, 'show']) ;
    Route::post('{id}', [LanguageController::class, 'update']) ;
});
