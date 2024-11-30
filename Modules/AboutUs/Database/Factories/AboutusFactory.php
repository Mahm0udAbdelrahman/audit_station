<?php

namespace Modules\AboutUs\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\AboutUs\Models\AboutUs;

class AboutusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = AboutUs::class;

    public function definition(): array
    {
        return [
            'description' => 'This project is a comprehensive online cinema ticket booking system designed to streamline the process of reserving movie tickets. Users can browse through available movies',
            'YouTube_Link' => $this->faker->url,
        ];
    }
}
