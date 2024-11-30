<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\AboutUs\Http\Controllers\AboutUsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('about_us')->group(function () {
    Route::get('', [AboutUsController::class,'show']);
    Route::post('', [AboutUsController::class, 'update']);
});
