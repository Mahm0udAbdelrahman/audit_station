<?php

namespace Modules\Interviewerr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Interviewerr\Database\Seeders\InterviewerrDatabaseSeeder;
use Modules\Interviewerr\Enums\InterviewerrTypeEnum;
use Modules\Interviewerr\Models\Availability;
use Modules\Interviewerr\Models\Interviewerr;

class AvailabilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Interviewerr\Models\Availability::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'interviewer_id' => UserTypeEnum::INTERVIEWER,
            'from_time' => $this->faker->time('H:i'),
            'time_to' => function (array $attributes) {
                return date('H:i', strtotime($attributes['from_time'] . ' +1 hour'));
            },
            'notes' => $this->faker->optional()->text(150),
            'description' => $this->faker->optional()->text(500),
            'to_job' => $this->faker->jobTitle,
            'type' => $this->faker->randomElement([InterviewerrTypeEnum::Accepte,InterviewerrTypeEnum::Rejected,]),
        ];
    }
}

