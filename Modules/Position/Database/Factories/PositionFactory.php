<?php

namespace Modules\Position\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Position\Models\Position::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}

