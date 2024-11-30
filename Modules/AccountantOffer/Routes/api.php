<?php

use Illuminate\Support\Facades\Route;
use Modules\AccountantOffer\Http\Controllers\AccountantOfferController;






Route::prefix('accountant_offers')->group(function () {
    Route::get('showall', [AccountantOfferController::class, 'showall']);
    Route::post('store', [AccountantOfferController::class, 'store']);
    Route::get('show/{id}', [AccountantOfferController::class, 'show']);
    Route::post('update/{id}', [AccountantOfferController::class, 'update']);
    Route::delete('destroy/{id}', [AccountantOfferController::class, 'destroy']);

    Route::get('/accountants/{id}/offers', [AccountantOfferController::class, 'getAccountantWithOffers']);
    Route::get('/offers/{offerId}/accountant', [AccountantOfferController::class, 'getOfferAccountant']);
});
