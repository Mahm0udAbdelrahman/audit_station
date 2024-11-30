<?php

use Illuminate\Support\Facades\Route;
use Modules\Company\Http\Controllers\CompanyController;

Route::group(['prefix' => 'companies' , 'middleware' => 'auth:sanctum'],function() {
    Route::get('showall', [CompanyController::class, 'showall']);
    Route::get('show/{id}', [CompanyController::class, 'show']);
    Route::post('store', [CompanyController::class, 'store']);
    Route::post('update/{id}', [CompanyController::class, 'update']);
    Route::delete('destroy/{id}', [CompanyController::class, 'destroy']);

    Route::post('upgrade', [CompanyController::class, 'upgrade']);
});

