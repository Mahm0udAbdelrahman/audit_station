<?php

namespace Modules\SubCategory\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;

use Modules\SubCategory\Models\SubCategory;

class SubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = SubCategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'category_id' =>  rand(1 , CategoryDatabaseSeeder::$count),
        ];
    }
}
