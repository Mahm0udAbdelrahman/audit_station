<?php

use Illuminate\Support\Facades\Route;
use Modules\Accountant\Http\Controllers\AccountantController;

Route::group(['prefix' => 'accountants' , 'middleware' => 'auth:sanctum'] ,function () {
    Route::get('showall', [AccountantController::class, 'showall']);
    Route::post('store', [AccountantController::class, 'store']);
    Route::get('show/{id}', [AccountantController::class, 'show']);
    Route::post('update/{id}', [AccountantController::class, 'update']);
    Route::delete('destroy/{id}', [AccountantController::class, 'destroy']);

    Route::post('upgrade', [AccountantController::class, 'upgrade']);
});
