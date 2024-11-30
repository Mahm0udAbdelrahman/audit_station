<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\SocialMedia\Http\Controllers\SocialMediaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('social_media')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [SocialMediaController::class, 'index']);
    Route::post('/', [SocialMediaController::class, 'store']);
    Route::get('{id}', [SocialMediaController::class, 'show']);
    Route::post('{id}', [SocialMediaController::class, 'update']);
    Route::delete('{id}', [SocialMediaController::class, 'destroy']);
});
