<?php

namespace Modules\Instructor\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Instructor\Models\Experience;
use Modules\Instructor\Models\Instructor;

class ExperienceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::factory(50)->create();
    }
}
