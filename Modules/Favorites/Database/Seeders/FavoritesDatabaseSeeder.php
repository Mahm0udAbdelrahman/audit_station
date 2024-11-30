<?php

namespace Modules\Favorites\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Favorites\Models\Favorite;
use Modules\Videos\Models\Video;

class FavoritesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        Favorite::factory(50)->create();

    }
}
