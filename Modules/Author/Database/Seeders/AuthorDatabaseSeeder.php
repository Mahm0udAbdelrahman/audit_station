<?php

namespace Modules\Author\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Author\Models\Author;

class AuthorDatabaseSeeder extends Seeder
{

    public static int $count = 1;


    public function run(): void
    {

        Author::factory(self::$count)->create();
    }
}
