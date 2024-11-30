<?php

namespace Modules\Course\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Category\Models\Category;
use Modules\Course\Enums\CertificationsEnum;
use Modules\Course\Enums\SkillLevelEnum;
use Modules\Course\Models\Course;
use Modules\Instructor\Database\Seeders\InstructorDatabaseSeeder;
use Modules\Instructor\Models\Instructor;
use Modules\Language\Database\Seeders\LanguageDatabaseSeeder;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'course_name' => $this->faker->sentence(3),
            'instructor_name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'percentage' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->text(200),
            'category_id' => rand(1, CategoryDatabaseSeeder::$count),
            'instructor_id' => rand(1, InstructorDatabaseSeeder::$count),
            'duration' => $this->faker->numberBetween(1, 50),
            'lessons' => $this->faker->numberBetween(20, 500),
            'quizzes' => $this->faker->numberBetween(20, 30),
            'level' => $this->faker->randomElement([
                SkillLevelEnum::Beginner,
                SkillLevelEnum::Intermediate,
                SkillLevelEnum::Expert
            ]),
            'certifications' => $this->faker->randomElement([
                CertificationsEnum::YES,
                CertificationsEnum::NO,
            ]),
            'date' => now(),
        ];


    }
}

