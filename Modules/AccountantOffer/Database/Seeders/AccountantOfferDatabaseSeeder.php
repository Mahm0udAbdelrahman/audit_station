<?php

namespace Modules\AccountantOffer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AccountantOffer\Models\AccountantOffer;

class AccountantOfferDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccountantOffer::factory(50)->create();
    }
}
