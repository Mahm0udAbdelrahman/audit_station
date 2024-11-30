<?php

namespace Modules\FavoriteJob\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\FavoriteJob\Models\FavoriteJob;

class FavoriteJobDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FavoriteJob::factory(50)->create();
    }
}
