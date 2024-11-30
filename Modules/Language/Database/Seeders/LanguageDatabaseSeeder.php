<?php

namespace Modules\Language\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Language\Models\Language;

class LanguageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static int $count = 50;
    public function run(): void
    {


        Language::factory(self::$count)->create();

    }
}
