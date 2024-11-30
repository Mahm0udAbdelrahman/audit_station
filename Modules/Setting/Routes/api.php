<?php
use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\SettingController;

Route::get('setting', [SettingController::class, 'show']);
Route::post('setting', [SettingController::class, 'update']);
