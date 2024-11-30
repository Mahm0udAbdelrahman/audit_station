<?php

namespace Modules\Blogs\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Author\Database\Seeders\AuthorDatabaseSeeder;
use Modules\Author\Models\Author;
use Modules\Blogs\Models\Blog;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Category\Models\Category;
use Modules\SubCategory\Database\Seeders\SubCategoryDatabaseSeeder;
use Modules\SubCategory\Models\SubCategory;

class BlogsFactory extends Factory
{


    protected $model = Blog::class;




    public function definition(): array
    {
        return [
            'title' => 'This project is a comprehensive online',
            'description' => 'This project is a comprehensive online cinema ticket booking system designed to streamline the process of reserving movie tickets.',
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'twitter' => fake()->url(),
            'linkedin' => fake()->url(),
            'youtube' => fake()->url(),
            'tiktok' => fake()->url(),
            'tags' => $this->faker->url(),
            'category_id' => rand(1 , CategoryDatabaseSeeder::$count),
            'author_id' => rand(1 , AuthorDatabaseSeeder::$count),
            'sub_category_id' => rand(1 , SubCategoryDatabaseSeeder::$count),
        ];
    }
}
