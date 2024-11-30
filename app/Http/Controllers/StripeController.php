<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;

class StripeController extends Controller
{
    // public $stripe;
    // public function __construct()
    // {
    //     $this->stripe = new StripeClient([
    //         config('stripe.api_key.secret')

    //     ]);
    // }



    // public function pay()
    // {
    //     dd('asdsad');
    //     $session = $this->stripe->checkout->sessions->create([
    //         'line_items' => [[
    //             'price_data' => [
    //                 'currency' => 'usd',
    //                 'product_data' => [
    //                     'name' => 'Premium Account',
    //                 ],
    //                 'unit_amount' => 999,
    //             ],
    //             'quantity' => 1,
    //         ]],
    //         'mode' => 'payment',
    //         'success_url' => route('stripe.success'),
    //         'cancel_url' => route('stripe.cancel'),
    //     ]);
    //     return redirect($session->url);
    // }
}
