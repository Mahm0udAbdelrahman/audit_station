<?php

use Illuminate\Support\Facades\Route;
use Modules\Stripe\Http\Controllers\StripeController;

Route::get('get-checkout-session',  [StripeController::class, "checkout"])->name('stripe.success');
Route::post('create-checkout-session',  [StripeController::class , 'pay'] )->name('stripe.pay');
