<?php

namespace Modules\Ads\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ads\Models\Ad;

class AdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'link' => $this->faker->url,
          

        ];
    }
}

