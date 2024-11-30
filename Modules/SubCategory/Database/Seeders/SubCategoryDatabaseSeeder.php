<?php

namespace Modules\SubCategory\Database\Seeders;

use Illuminate\Database\Seeder;
// use Modules\Category\Models\Category;
use Modules\SubCategory\Models\SubCategory;

class SubCategoryDatabaseSeeder extends Seeder
{

    public static int $count = 50;

    public function run(): void
    {

        SubCategory::factory(self::$count)->create();
    }
}
