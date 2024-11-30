<?php
namespace Modules\JobOffer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Company\Database\Seeders\CompanyDatabaseSeeder;
use Modules\Company\Models\Company;
use Modules\JobOffer\Models\JobOffer;

class JobOfferFactory extends Factory
{
    protected $model = JobOffer::class;

    public function definition(): array
    {
        return [
            'position' => $this->faker->jobTitle,
            'date' => $this->faker->date(),
            'sallary' => $this->faker->randomFloat(2, 1000, 5000),
            'country' => $this->faker->country,
            'experience' => $this->faker->numberBetween(0, 10),
            'education' => $this->faker->randomElement(['Bachelor', 'Master', 'PhD']),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'type' => $this->faker->randomElement(['fullTime', 'partTime']),
            'is_favorite' => $this->faker->boolean,
            'show' => $this->faker->boolean,
            'company_id' => 1,
        ];
    }
}
