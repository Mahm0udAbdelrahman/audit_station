<?php

use App\Http\Controllers\FavoriteController;

use Illuminate\Support\Facades\Route;
use Modules\Favorites\Http\Controllers\FavoritesController;

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

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('favorites')->group(function () {

        Route::get('showall', [FavoritesController::class, 'showall']);
        Route::get('show/{id}', [FavoritesController::class, 'show']);
        Route::put('/update/{id}', [FavoritesController::class, 'update']);
        Route::post('store', [FavoritesController::class, 'store'])->middleware('auth:sanctum');
        Route::delete('destroy/{id}', [FavoritesController::class, 'destroy']);

    });

});



