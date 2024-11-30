<?php

namespace Modules\Accountant\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Accountant\Models\Accountant;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Admin\Models\Admin;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Company\Database\Seeders\CompanyDatabaseSeeder;
use Modules\Users\Database\Seeders\UsersDatabaseSeeder;

class AccountantFactory extends Factory
{


    protected $model = Accountant::class;




    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement(['activated', 'deactivated']),
            'country' => $this->faker->country(),
            'academic_qualification' => $this->faker->word(),
            'position' => $this->faker->word(),
            'experience' => $this->faker->sentence(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'certificate' => $this->faker->optional()->word(),
            'user_id' => UserTypeEnum::ACCOUNTANT,
            'company_id' => UserTypeEnum::COMPANY,
        ];
    }
}

