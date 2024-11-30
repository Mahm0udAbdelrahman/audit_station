<?php

namespace Modules\Instructor\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Instructor\Database\Seeders\InstructorDatabaseSeeder;
use Modules\Instructor\Models\Experience;
use Modules\Instructor\Models\Instructor;

class ExperienceFactory extends Factory
{



    protected $model = Experience::class;



    public function definition(): array
    {
        return [
            'position' => $this->faker->word(),
            'experience' => $this->faker->sentence(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'instructor_id' => 1
        ];
    }
}

