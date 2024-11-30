<?php

namespace Modules\Upgrade\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Upgrade\Enums\TargetTypeEnum;
use Modules\Upgrade\Enums\TypeEnum;
use Modules\Upgrade\Models\Upgrade;

class UpgradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Upgrade::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {

        return [
            'user_id' => UserTypeEnum::NORMAL_USER,
            'target_type' => $this->faker->randomElement([
                TargetTypeEnum::NORMAL_USER,
                TargetTypeEnum::INSTRUCTOR,
                TargetTypeEnum::ACCOUNTANT,
                TargetTypeEnum::COMPANY,
                TargetTypeEnum::CERTIFIED,
            ]),
            'status' => $this->faker->randomElement([
                TypeEnum::Waitting,
                TypeEnum::Approved,
                TypeEnum::Rejected
            ]),
        ];
    }
}

