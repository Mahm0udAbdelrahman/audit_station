<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CoursesController;
use Modules\Instructor\Http\Controllers\ExperienceController;
use Modules\Instructor\Http\Controllers\InstructorController;
use Modules\Videos\Http\Controllers\VideosController;

Route::group(['prefix' => 'instructors' , 'middleware' => 'auth:sanctum'], function () {
    Route::get('showall', [InstructorController::class, 'showall']);
    Route::get('show/{id}', [InstructorController::class, 'show']);
    Route::put('/update/{id}', [InstructorController::class, 'update']);
    Route::put('/instructors/{id}', [InstructorController::class, 'update']);
    Route::post('store', [InstructorController::class, 'store']);
    Route::delete('destroy/{id}', [InstructorController::class, 'destroy']);
    Route::post('upgrade', [InstructorController::class, 'upgrade']);


    Route::resource('/instructors/courses', CoursesController::class);
    Route::resource('/instructors/videos', VideosController::class);
    Route::post('instructors/{id}/approve', [InstructorController::class, 'approveInstructor']);
    Route::post('instructors/{id}/reject', [InstructorController::class, 'rejectInstructor']);
});



Route::group(['prefix' => 'experiences'], function () {
    Route::get('showall', [ExperienceController::class, 'showall']);
    Route::get('show/{id}', [ExperienceController::class, 'show']);
    Route::put('/update/{id}', [ExperienceController::class, 'update']);
    Route::post('store', [ExperienceController::class, 'store']);
    Route::delete('destroy/{id}', [ExperienceController::class, 'destroy']);
});
