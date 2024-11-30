<?php

namespace Modules\Interviewerr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Interviewerr\Models\Interviewerr;

class InterviewerrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Interviewerr::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement(['activated', 'deactivated']),
            'show' => $this->faker->randomElement(['0', '1']),
            'permission' => $this->faker->word(),
            'phone' => $this->faker->optional()->phoneNumber(),
            'country' => $this->faker->country(),
            'level_education' => $this->faker->word(),
            'certificate' => $this->faker->word(),
            'user_id' => UserTypeEnum::INTERVIEWER,
        ];
    }
}

