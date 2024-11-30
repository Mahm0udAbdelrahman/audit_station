<?php

namespace Modules\BuyCoins\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CoinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\BuyCoins\Models\Coin::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'coins' => $this->faker->randomNumber(3) ,
            'doller' => $this->faker->randomNumber(3) ,
        ];
    }
}

