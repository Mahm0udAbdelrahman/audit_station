<?php

namespace Modules\SendOffer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SendOffer\Models\SendOffer;

class SendOfferDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      SendOffer::factory(50)->create();
    }
}
