<?php

namespace Modules\Ads\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Ads\Models\Ad;

class AdsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

        Ad::factory(50)->create();
    }
}
