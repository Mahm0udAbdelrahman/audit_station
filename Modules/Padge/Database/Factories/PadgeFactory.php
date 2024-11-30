<?php

namespace Modules\Padge\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Color\Models\Color;

class PadgeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Padge\Models\Padge::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'type' => $this->faker->sentence(2),
            'color_id' => Color::factory(),
            'status' => $this->faker->randomElement(['0', '1']),
        ];
    }
}

