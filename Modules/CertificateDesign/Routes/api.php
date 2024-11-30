<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\CertificateDesign\Http\Controllers\CertificateDesignController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('certificate_designs')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CertificateDesignController::class, 'index']);
    Route::post('/', [CertificateDesignController::class, 'store']);
    Route::get('{id}', [CertificateDesignController::class, 'show']);
    Route::post('{id}', [CertificateDesignController::class, 'update']);
    Route::delete('{id}', [CertificateDesignController::class, 'destroy']);
    Route::get('/download/{id}', [CertificateDesignController::class, 'download']);
});
