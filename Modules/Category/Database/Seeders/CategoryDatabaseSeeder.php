<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Validation\Rules\In;
use Modules\Category\Models\Category;
// use Modules\SubCategory\Models\SubCategory;

class CategoryDatabaseSeeder extends Seeder
{

    public static int $count = 50;

    public function run(): void
    {
        Category::factory(self::$count)->create();
    }
}
