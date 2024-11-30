<?php

use Illuminate\Support\Facades\Route;
use Modules\JobOffer\Http\Controllers\JobOfferController;


Route::prefix('job_offers')->group(function(){

    Route::get('showall', [JobOfferController::class, 'showall']);
    Route::get('show/{id}', [JobOfferController::class, 'show']);
    Route::put('/update/{id}', [JobOfferController::class, 'update']);
    Route::post('store', [JobOfferController::class, 'store']);
    Route::delete('destroy/{id}', [JobOfferController::class, 'destroy']);
    Route::post('/job-offers/{id}/favorite', [JobOfferController::class, 'toggleFavorite']);

    Route::get('/filterSearchJob', [JobOfferController::class, 'filterSearchJob']);
});

