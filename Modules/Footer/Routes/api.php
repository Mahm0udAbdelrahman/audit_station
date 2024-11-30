<?php

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Route;
use Modules\Footer\Http\Controllers\FooterController;


Route::put('footer', [FooterController::class, 'update']);
Route::get('footer', [FooterController::class, 'show']);
