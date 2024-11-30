<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CoursesController;



Route::prefix('courses')->group(function () {
    Route::get('showall', [CoursesController::class, 'showall']);
    Route::get('show/{id}', [CoursesController::class, 'show']);
    Route::put('/update/{id}', [CoursesController::class, 'update']);
    Route::post('store', [CoursesController::class, 'store']);
    Route::delete('destroy/{id}', [CoursesController::class, 'destroy']);
});





