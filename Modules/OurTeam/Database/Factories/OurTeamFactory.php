<?php

namespace Modules\OurTeam\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Position\Models\Position;

class OurTeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\OurTeam\Models\OurTeam::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'position_id' => Position::factory(),
            'facebook' => $this->faker->url,
            'twitter' => $this->faker->url,
            'instagram' => $this->faker->url,
            'linkedin' => $this->faker->url,
            'telegram' => $this->faker->url,
            'snapchat' => $this->faker->url,
            'youtube' => $this->faker->url,
            'whatsapp' => $this->faker->url,
            'tiktok' => $this->faker->url,

            'status' => $this->faker->numberBetween(0, 1),
        ];

    }
}

