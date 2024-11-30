<?php

use Illuminate\Support\Facades\Route;
use Modules\BecomeCompany\Http\Controllers\BecomeCompanyController;


Route::prefix('become_companies')->group(function () {
    Route::get('showall', [BecomeCompanyController::class, 'showall']);
    Route::post('store', [BecomeCompanyController::class, 'store']);
    Route::get('show/{id}', [BecomeCompanyController::class, 'show']);
    Route::post('update/{id}', [BecomeCompanyController::class, 'update']);
    Route::delete('destroy/{id}', [BecomeCompanyController::class, 'destroy']);
});
