<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\ContactUs\Http\Controllers\ContactUsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('contact_us')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ContactUsController::class, 'index']);
    Route::post('/', [ContactUsController::class, 'store']);
    Route::get('{id}', [ContactUsController::class, 'show']);
    Route::delete('{id}', [ContactUsController::class, 'destroy']);

});
