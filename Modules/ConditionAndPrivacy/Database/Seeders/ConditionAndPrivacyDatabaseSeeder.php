<?php

namespace Modules\ConditionAndPrivacy\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ConditionAndPrivacy\Models\ConditionAndPrivacy;

class ConditionAndPrivacyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

          ConditionAndPrivacy::factory(100)->create();
    }
}
