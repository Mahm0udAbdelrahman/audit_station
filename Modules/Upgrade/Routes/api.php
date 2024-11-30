<?php

use Illuminate\Support\Facades\Route;
use Modules\Upgrade\Http\Controllers\UpgradeController;




Route::prefix('upgrades')->group(function () {
    Route::post('/request', [UpgradeController::class, 'requestUpgrade'])->middleware('auth:sanctum');
    Route::get('/{id}', [UpgradeController::class, 'showUpgradeDetails'])->middleware('auth:sanctum');
    Route::post('/approve-or-reject-upgrade/{id}', [UpgradeController::class, 'approveOrRejectUpgrade'])->middleware('auth:sanctum');
    Route::post('/take-exam/{id}', [UpgradeController::class, 'takeExam'])->middleware('auth:sanctum');

});

Route::prefix('certified')->middleware('auth:sanctum')->group(function () {
    Route::post('/fill-data', [UpgradeController::class, 'fillCertifiedData']);
Route::get('/certified-data/{id}', [UpgradeController::class, 'viewCertifiedData']);

});

