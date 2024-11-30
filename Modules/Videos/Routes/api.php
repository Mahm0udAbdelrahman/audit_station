<?php

use Illuminate\Support\Facades\Route;
use Modules\Videos\Http\Controllers\VideosController;
use App\Http\Controllers\VideoController;




Route::prefix('videos')->group(function () {

    Route::get('showall', [VideosController::class, 'showall']);
    Route::get('show/{id}', [VideosController::class, 'show']);
    Route::post('/update/{id}', [VideosController::class, 'update']);
    Route::post('store', [VideosController::class, 'store']);
    Route::delete('destroy/{id}', [VideosController::class, 'destroy']);
    Route::get('/download-video/{id}', [VideosController::class, 'downloadVideo']);
});

