<?php

use Illuminate\Support\Facades\Route;
use Modules\Faqs\Http\Controllers\FaqsController;

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



Route::prefix('faqs')->group(function () {

    Route::get('showall', [FaqsController::class, 'showall']);
    Route::get('show/{id}', [FaqsController::class, 'show']);
    Route::put('/update/{id}', [FaqsController::class, 'update']);
    Route::post('store', [FaqsController::class, 'store']);
    Route::delete('destroy/{id}', [FaqsController::class, 'destroy']);
});
