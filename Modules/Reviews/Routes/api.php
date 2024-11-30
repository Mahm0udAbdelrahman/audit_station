<?php

use Illuminate\Support\Facades\Route;
use Modules\Reviews\Http\Controllers\ReviewsController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/



Route::prefix('reviews')->group(function () {

    Route::get('showall', [ReviewsController::class, 'showall']);
    Route::get('show/{id}', [ReviewsController::class, 'show']);
    Route::put('/update/{id}', [ReviewsController::class, 'update']);
    Route::post('store', [ReviewsController::class, 'store']);
    Route::delete('destroy/{id}', [ReviewsController::class, 'destroy']);

});
