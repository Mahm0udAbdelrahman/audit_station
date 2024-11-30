<?php

namespace Modules\OurTeam\Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Modules\OurTeam\Models\OurTeam;

class OurTeamDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $ourTeams = OurTeam::factory(20)->create();
    }
}
