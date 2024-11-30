<?php

namespace Modules\Upgrade\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Upgrade\Models\Certifide;

class CertifideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certifide::factory(50)->create();
    }
}
