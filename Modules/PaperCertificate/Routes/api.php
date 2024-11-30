<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\PaperCertificate\Http\Controllers\PaperCertificateController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('PaperCertificate')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PaperCertificateController::class, 'index']);
    Route::post('/', [PaperCertificateController::class, 'store']);
    Route::get('{id}', [PaperCertificateController::class, 'show']);
    Route::post('{id}', [PaperCertificateController::class, 'update']);
    Route::delete('{id}', [PaperCertificateController::class, 'destroy']);
});
