<?php

namespace Modules\ContactUs\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ContactUs\Models\ContactUs;

class ContactUsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = ContactUs::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'subject' => $this->faker->sentence(3),
            'message' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 1),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}

