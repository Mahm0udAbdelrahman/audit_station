<?php

namespace Modules\Color\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Color\Models\Color;

class ColorDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);


        Color::factory(100)->create();
    }
}
