<?php

namespace Modules\ConditionAndPrivacy\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConditionAndPrivacyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\ConditionAndPrivacy\Models\ConditionAndPrivacy::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraph(3),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}

