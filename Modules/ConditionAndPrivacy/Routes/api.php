<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\ConditionAndPrivacy\Http\Controllers\ConditionAndPrivacyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('condition_and_privacy')->middleware('auth:sanctum')->group(function () {
      Route::get('', [ConditionAndPrivacyController::class, 'show']);
    Route::post('', [ConditionAndPrivacyController::class, 'update']);
 });
