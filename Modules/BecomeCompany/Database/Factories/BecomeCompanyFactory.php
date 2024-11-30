<?php

namespace Modules\BecomeCompany\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\BecomeCompany\Models\BecomeCompany;
use Modules\Company\Models\Company;
use Modules\Users\Database\Seeders\UsersDatabaseSeeder;

class BecomeCompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = BecomeCompany::class;



    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company,
            'owner_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'company_address' => $this->faker->address,
            'company_work' => $this->faker->word,
            'position_in_company' => $this->faker->word,
            'company_headquarter' => $this->faker->address,
            'status' => $this->faker->randomElement(['rejected', 'approved', 'waitting']),
            'show' => $this->faker->boolean,
            'user_id' => UserTypeEnum::COMPANY,
        ];
    }
}
