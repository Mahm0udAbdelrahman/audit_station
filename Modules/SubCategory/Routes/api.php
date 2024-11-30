<?php

use Illuminate\Support\Facades\Route;
use Modules\SubCategory\Http\Controllers\SubCategoryController;

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

Route::prefix('sub_categories')->group(function () {

    Route::get('showall', [SubCategoryController::class, 'showall']);
    Route::get('show/{id}', [SubCategoryController::class, 'show']);
    Route::put('update/{id}', [SubCategoryController::class, 'update']);
    Route::post('store', [SubCategoryController::class, 'store']);
});


