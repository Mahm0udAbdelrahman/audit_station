<?php

namespace Modules\Upgrade\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Upgrade\Models\Upgrade;

class UpgradeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Upgrade::factory(25)->create();
    }
}
