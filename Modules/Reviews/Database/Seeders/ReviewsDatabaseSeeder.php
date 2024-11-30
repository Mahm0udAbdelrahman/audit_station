<?php

namespace Modules\Reviews\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Reviews\Models\Review;

class ReviewsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

        Review::factory(50)->create();
    }
}
