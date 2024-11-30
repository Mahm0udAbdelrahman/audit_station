<?php

namespace Modules\AccountantOffer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Accountant\Database\Seeders\AccountantDatabaseSeeder;
use Modules\Accountant\Models\Accountant;
use Modules\AccountantOffer\Models\AccountantOffer;
use Modules\Auth\Enums\UserTypeEnum;

class AccountantOfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = AccountantOffer::class;

    public function definition(): array
    {
        return [
        'position' => $this->faker->jobTitle(),
        'date' => $this->faker->date(),
        'sallery' => $this->faker->randomFloat(2, 1000, 10000),
        'type' => $this->faker->randomElement(['fullTime', 'partTime']),
        'status' => $this->faker->randomElement(['rejected', 'approved', 'waitting']),
        'accountant_id' => 1,
        'show' => $this->faker->boolean(),
    ];
    }
}

