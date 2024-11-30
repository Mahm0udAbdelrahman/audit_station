<?php

namespace Modules\Author\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Author\Models\Author;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'title' => 'This project is a comprehensive online',

        ];
    }
}
