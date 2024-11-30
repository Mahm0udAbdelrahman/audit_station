<?php

namespace Modules\Interviewerr\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Interviewerr\Models\Availability;

class AvailabilityDatabaseSeeder extends Seeder
{


    public function run(): void
    {
        Availability::factory(50)->create();
    }
}
