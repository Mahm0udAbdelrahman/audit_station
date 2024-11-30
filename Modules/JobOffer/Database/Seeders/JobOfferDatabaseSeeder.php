<?php

namespace Modules\JobOffer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\JobOffer\Models\JobOffer;

class JobOfferDatabaseSeeder extends Seeder
{
    public static int $count = 50;
    public function run(): void
    {
        JobOffer::factory(self::$count)->create();
    }
}
