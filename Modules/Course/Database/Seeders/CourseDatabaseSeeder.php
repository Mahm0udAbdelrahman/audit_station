<?php

namespace Modules\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Course\Models\Course;

class CourseDatabaseSeeder extends Seeder
{


    public static int $count =50;

    public function run(): void
    {
       Course::factory(self::$count)->create();
    }
}
