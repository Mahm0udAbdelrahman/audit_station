<?php

namespace Modules\Padge\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Padge\Models\Padge;

class PadgeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

        Padge::factory(100)->create();

    }
}
