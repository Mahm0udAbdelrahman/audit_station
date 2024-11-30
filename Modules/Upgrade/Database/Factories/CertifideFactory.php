<?php

namespace Modules\Upgrade\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\JobOffer\Database\Seeders\JobOfferDatabaseSeeder;
use Modules\Upgrade\Models\Certifide;
use Modules\Users\Database\Seeders\UsersDatabaseSeeder;

class CertifideFactory extends Factory
{


    protected $model = Certifide::class;


    public function definition(): array
    {
        return [
            'education_qualifications' => $this->faker->word,
            'university_name' => $this->faker->company,
            'degree_title' => $this->faker->word,
            'GPA' => $this->faker->numberBetween(0, 100),
            'year_of_graduation' => $this->faker->date(),
            'certificate_name' => $this->faker->word,
            'certificate_type' => $this->faker->word,
            'source_of_certificate' => $this->faker->word,
            'courses_name' => $this->faker->word,
            'years_of_experience' => $this->faker->numberBetween(0, 30),
            'company_name' => $this->faker->company,
            'company_title' => $this->faker->word,
            'company_location' => $this->faker->city,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'user_id' => UserTypeEnum::CERTIFIED,
            'job_offer_id' => rand(1,JobOfferDatabaseSeeder::$count)
        ];
    }
}

