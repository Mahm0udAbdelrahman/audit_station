<?php

use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\NormalUser\Http\Controllers\AdminNormalUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::group(['prefix' => 'admin/normal_users', 'middleware' => GeneralHelper::adminMiddlewares()], function () {
//     Route::get('', [AdminNormalUserController::class, 'index']);
// });
