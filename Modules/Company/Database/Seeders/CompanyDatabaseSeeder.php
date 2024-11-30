<?php

namespace Modules\Company\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Company\Models\Company;

class CompanyDatabaseSeeder extends Seeder
{

    public static int $count = 1;

    public function run(): void
    {
        Company::factory(self::$count)->create();
    }
}
