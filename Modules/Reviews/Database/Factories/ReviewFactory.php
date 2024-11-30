<?php

namespace Modules\Reviews\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Course\Database\Seeders\CourseDatabaseSeeder;
use Modules\Course\Models\Course;
use Modules\Reviews\Models\Review;
use Modules\Users\Database\Seeders\UsersDatabaseSeeder;
use Spatie\MediaLibrary\Conversions\ImageGenerators\Video;

class ReviewFactory extends Factory
{

    protected $model = Review::class;


    public function definition(): array
    {
        $reviewable = Course::factory()->create();

        return [
        'reviewable_type' => Course::class,
        'reviewable_id' => rand(1 , CourseDatabaseSeeder::$count),
        'user_id' => UserTypeEnum::NORMAL_USER,
        'course_id' => rand(1 , CourseDatabaseSeeder::$count),
        'course_name' => $this->faker->words(3, true),
        'date' => $this->faker->date(),
        'review' => $this->faker->paragraph(),
        'rating' => $this->faker->randomFloat(1, 0, 5),
        'approval_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),

        ];
    }
}

