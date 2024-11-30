<?php

use Illuminate\Support\Facades\Route;
use Modules\Author\Http\Controllers\AuthorController;

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

Route::prefix('authors')->group(function () {

    Route::get('showall', [AuthorController::class, 'showall']);
    Route::get('show/{id}', [AuthorController::class, 'show']);
    Route::post('update/{id}', [AuthorController::class, 'update']);
    Route::post('store', [AuthorController::class, 'store']);

});
