<?php

namespace Modules\Company\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Company\Models\Company;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'company_name' => $this->faker->company,
            'email' => $this->faker->unique()->companyEmail,
            'status' => $this->faker->randomElement(['activated', 'deactivated']),
            'show' => $this->faker->boolean,
            'phone' => $this->faker->phoneNumber,
            'position' => $this->faker->jobTitle,
            'specialization' => $this->faker->word,
            'country' => $this->faker->country,
            'companyAddress' => $this->faker->address,
            'certificate' => null,
            'user_id'=> UserTypeEnum::NORMAL_USER,
        ];
    }
}

