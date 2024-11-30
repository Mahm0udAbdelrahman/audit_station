<?php

namespace Modules\Accountant\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accountant\Models\Accountant;

class AccountantDatabaseSeeder extends Seeder
{

    public static int $count = 50;


    public function run(): void
    {
        Accountant::factory(self::$count)->create();
    }
}
