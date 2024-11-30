<?php

namespace Modules\Stripe\Http\Controllers;

use App\Http\Controllers\Controller;
use Stripe\StripeClient;


class StripeController extends Controller
{
    public $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(

            config('stripe.api_key.secret')


        );
    }

    public function checkout()
    {
        return view('stripe::stripe');
    }

    public function pay()
    {



        $session = $this->stripe->checkout->sessions->create([
             'mode' => 'payment',
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Premium Account',
                    ],
                    'unit_amount' => 999,
                ],
                'quantity' => 1,
            ],
            [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'T-Shirt',
                        'images' => ['https://www.google.com/url?sa=i&url=https%3A%2F%2Feagle.com.eg%2Fproducts%2Ft-shirt-r-regular-printed-tr-1087&psig=AOvVaw1tnIOH06gPG95hwaT6mGkL&ust=1729846026974000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCLiS6a22pokDFQAAAAAdAAAAABAE'],
                        'description' => 'T-Shirt description',
                    ],
                    'unit_amount' => 999,
                ],
                'quantity' => 2,
            ]
        ],
            "customer_creation" => "if_required"

        ]);
        return redirect($session->url);
    }

}
