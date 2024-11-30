<?php

namespace Modules\Videos\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Videos\Models\Video;

class VideosDatabaseSeeder extends Seeder
{




     public static int $count = 20;



    public function run(): void
    {
        Video::factory(self::$count)->create();
    }
}
