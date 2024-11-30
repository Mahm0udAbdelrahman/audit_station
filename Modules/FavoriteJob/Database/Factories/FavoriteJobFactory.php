<?php

namespace Modules\FavoriteJob\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteJobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\FavoriteJob\Models\FavoriteJob::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

