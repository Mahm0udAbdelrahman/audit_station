<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\AuthSocialiteController;
use Modules\Auth\Http\Controllers\DeleteAccountController;
use Modules\Auth\Http\Controllers\EmployeeController;
use Modules\Auth\Http\Controllers\LogOutController;
use Modules\Auth\Http\Controllers\OTPController;
use Modules\Auth\Http\Controllers\PasswordController;
use Modules\Auth\Http\Controllers\ProfileController;
use Modules\Auth\Http\Controllers\RefreshTokenController;
use Modules\Auth\Http\Controllers\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'index']);
    Route::post('/', [RegisterController::class, 'store']);
    Route::get('{id}', [RegisterController::class, 'show']);
    Route::post('{id}', [RegisterController::class, 'update']);
    Route::delete('{id}', [RegisterController::class, 'destroy']);
});

Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::post('/', [EmployeeController::class, 'store']);
    Route::get('{id}', [EmployeeController::class, 'show']);
    Route::post('{id}', [EmployeeController::class, 'update']);
    Route::delete('{id}', [EmployeeController::class, 'destroy']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('login-dashboard', [AuthController::class, 'loginDashboard']);
Route::post('otp', [OTPController::class, 'otp']);
Route::post('/verify-otp',[OTPController::class, 'verifyOtp']);
Route::post('/reset-password', [PasswordController::class, 'resetPassword']);
Route::post('forgot-password', [PasswordController::class, 'forgotPassword']);
Route::post('change-password', [PasswordController::class, 'changePassword'])->middleware('auth:sanctum');
Route::post('/profile', [ProfileController::class, 'profile'])->middleware('auth:sanctum');
Route::get('/profile', [ProfileController::class, 'showProfile'])->middleware('auth:sanctum');
Route::post('logout', [LogOutController::class, 'logout'])->middleware('auth:sanctum');
Route::post('delete-account', [DeleteAccountController::class, 'deleteAccount'])->middleware('auth:sanctum');
Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');
Route::get('auth/{provider}/redirect', [AuthSocialiteController::class, 'redirect']);
Route::get('auth/{provider}/callback', [AuthSocialiteController::class, 'callback']);
Route::post('refresh_tokens/rotate', [RefreshTokenController::class, 'rotate']);
Route::post('refresh_tokens/refresh', [AuthController::class, 'refreshToken']);
