<?php

namespace Modules\BecomeCompany\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\BecomeCompany\Models\BecomeCompany;

class BecomeCompanyDatabaseSeeder extends Seeder
{


    public function run(): void
    {
        BecomeCompany::factory(50)->create();
    }
}


