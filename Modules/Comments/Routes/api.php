<?php

use Illuminate\Support\Facades\Route;
use Modules\Comments\Http\Controllers\CommentsController;

Route::group(['prefix' => 'comments' , 'middleware' => 'auth:sanctum'] ,function () {

    Route::get('showall', [CommentsController::class, 'showall']);
    Route::get('show/{id}', [CommentsController::class, 'show']);
    Route::put('/update/{id}', [CommentsController::class, 'update']);
    Route::post('store', [CommentsController::class, 'store']);
    Route::delete('destroy/{ids}', [CommentsController::class, 'destroy']);
});
