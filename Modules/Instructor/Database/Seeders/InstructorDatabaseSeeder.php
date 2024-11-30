<?php

namespace Modules\Instructor\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Instructor\Models\Instructor;

class InstructorDatabaseSeeder extends Seeder
{
    public static int $count = 1;

    public function run(): void
    {
        Instructor::factory(self::$count)->create();
    }
}
