<?php

namespace Modules\Blogs\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blogs\Models\Blog;

class BlogsDatabaseSeeder extends Seeder
{

    public static int $count = 50;

    public function run(): void
    {
        Blog::factory(self::$count)->create();
    }
}
