<?php

use Illuminate\Support\Facades\Route;
use Modules\SendOffer\Http\Controllers\SendOfferController;


Route::prefix('send_offers')->group(function() {
    Route::get('showall', [SendOfferController::class, 'showall']);
    Route::get('show/{id}', [SendOfferController::class, 'show']);
    Route::post('store', [SendOfferController::class, 'store']);
    Route::post('update/{id}', [SendOfferController::class, 'update']);
    Route::delete('destroy/{id}', [SendOfferController::class, 'destroy']);
});
