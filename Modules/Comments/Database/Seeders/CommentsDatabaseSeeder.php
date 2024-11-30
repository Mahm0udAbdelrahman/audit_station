<?php

namespace Modules\Comments\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Comments\Models\Comment;

class CommentsDatabaseSeeder extends Seeder
{


    public static int $count = 50;

    public function run(): void
    {
        Comment::factory(self::$count)->create();
    }
}
