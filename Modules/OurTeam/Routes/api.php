<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\OurTeam\Http\Controllers\OurTeamController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('our_team')->group(function () {
    Route::get('/', [OurTeamController::class, 'index']);
    Route::post('/', [OurTeamController::class, 'store']);
    Route::get('{id}', [OurTeamController::class, 'show']);
    Route::post('{id}', [OurTeamController::class, 'update']);
    Route::delete('{id}', [OurTeamController::class, 'destroy']);
});
