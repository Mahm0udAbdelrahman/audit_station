<?php

use Illuminate\Support\Facades\Route;
use Modules\Ads\Http\Controllers\AdsController;





Route::prefix('ads')->group(function () {

    Route::get('showall', [AdsController::class, 'showall']);
    Route::get('show/{id}', [AdsController::class, 'show']);
    Route::post('update/{id}', [AdsController::class, 'update']);
    Route::post('store', [AdsController::class, 'store']);
    Route::delete('destroy/{id}', [AdsController::class, 'destroy']);

});
