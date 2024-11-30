<?php

namespace Modules\SendOffer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Company\Database\Seeders\CompanyDatabaseSeeder;
use Modules\Company\Models\Company;

class SendOfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\SendOffer\Models\SendOffer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sallery' => $this->faker->randomFloat(2, 1000, 5000),
            'country' => $this->faker->country(),
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['fullTime', 'partTime']),
            'description_job' => $this->faker->paragraph(),
            'benefits_job' => $this->faker->sentence(),
            'terms_job' => $this->faker->sentence(),
            'company_name' => $this->faker->company(),
            'company_id' => rand(1 , CompanyDatabaseSeeder::$count),
        ];
    }
}

