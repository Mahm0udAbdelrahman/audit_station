<?php

namespace Modules\Interviewerr\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Interviewerr\Models\Interviewerr;

class InterviewerrDatabaseSeeder extends Seeder
{
    public static int $count = 50;

    public function run(): void
    {
        Interviewerr::factory(self::$count)->create();
    }
}
