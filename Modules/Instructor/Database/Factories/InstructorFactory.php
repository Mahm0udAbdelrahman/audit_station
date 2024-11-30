<?php

namespace Modules\Instructor\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Admin\Models\Admin;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Instructor\Database\Seeders\InstructorDatabaseSeeder;
use Modules\Instructor\Models\Instructor;
use Modules\Users\Database\Seeders\UsersDatabaseSeeder;

class InstructorFactory extends Factory
{



    protected $model = Instructor::class;



    public function definition(): array
    {
        return [
            'user_id' => UserTypeEnum::INSTRUCTOR,
            'nationality' => $this->faker->country(),
            'address' => $this->faker->address(),
            'academic_qualification' =>  $this->faker->sentence(),
            'previous_work' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'university' => $this->faker->word(),
            'degree' => $this->faker->word(),
            'approval_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}

