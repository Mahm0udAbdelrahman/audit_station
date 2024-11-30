<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;
use Modules\Category\Models\Category;
use Modules\Category\Transformers\CategoryResource;

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
Route::prefix('categories')->group(function () {

    Route::get('showall', [CategoryController::class, 'showall']);
    Route::get('show/{id}', [CategoryController::class, 'show']);
    Route::post('update/{id}', [CategoryController::class, 'update']);
    Route::post('store', [CategoryController::class, 'store']);
    Route::delete('destroy/{id}', [CategoryController::class, 'destroy']);
    Route::get('/categories/{categoryId}/courses', [CategoryController::class, 'showCourses']);
    Route::get('/filterBlog', [CategoryController::class, 'filterSearchBlog']);
    Route::get('/filterCourse', [CategoryController::class, 'filterSearchCourse']);
});

