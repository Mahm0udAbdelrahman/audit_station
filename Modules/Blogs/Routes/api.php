<?php

use Illuminate\Support\Facades\Route;
use Modules\Blogs\Http\Controllers\BlogsController;

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

Route::prefix('blogs')->group(function () {

    Route::get('showall', [BlogsController::class, 'showall']);
    Route::get('show/{id}', [BlogsController::class, 'show']);
    Route::post('update/{id}', [BlogsController::class, 'update']);
    Route::delete('destroy/{id}', [BlogsController::class, 'destroy'])->middleware('auth:sanctum');
    Route::post('store', [BlogsController::class, 'store']);

});
