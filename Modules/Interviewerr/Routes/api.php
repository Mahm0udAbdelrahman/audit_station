<?php

use Illuminate\Support\Facades\Route;
use Modules\Interviewerr\Http\Controllers\AvailabilityController;
use Modules\Interviewerr\Http\Controllers\InterviewerrController;

Route::group(['prefix' => 'interviewerrs' , 'middleware' => 'auth:sanctum'],function () {
    Route::get('index', [InterviewerrController::class, 'index']);
    Route::post('store', [InterviewerrController::class, 'store']);
    Route::get('show/{id}', [InterviewerrController::class, 'show']);
    Route::post('update/{id}', [InterviewerrController::class, 'update']);
    Route::delete('destroy/{id}', [InterviewerrController::class, 'destroy']);

    Route::post('upgrade', [InterviewerrController::class, 'upgrade']);
});



Route::prefix('availabilities')->group(function(){

    Route::get('showall',[AvailabilityController::class,'showall']);
    Route::get('show/{id}',[AvailabilityController::class,'show']);
    Route::post('store',[AvailabilityController::class,'store']);
    Route::put('update/{id}',[AvailabilityController::class,'update']);
    Route::delete('destroy/{id}',[AvailabilityController::class,'destroy']);

});
