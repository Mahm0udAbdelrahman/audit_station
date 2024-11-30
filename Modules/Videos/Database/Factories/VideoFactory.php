<?php

namespace Modules\Videos\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Comments\Database\Seeders\CommentsDatabaseSeeder;
use Modules\Course\Database\Seeders\CourseDatabaseSeeder;
use Modules\Course\Models\Course;
use Modules\Videos\Models\Video;

class VideoFactory extends Factory
{


    protected $model = Video::class;


    public function definition(): array
    {
        return [
            'title' => 'This project is a comprehensive',
            'course_id' => rand(1,CourseDatabaseSeeder::$count),
        ];
    }
}

