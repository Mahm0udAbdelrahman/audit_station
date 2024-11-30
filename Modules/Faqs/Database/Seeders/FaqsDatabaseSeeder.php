<?php

namespace Modules\Faqs\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Faqs\Models\Faq;

class FaqsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

        Faq::factory(10)->create();
    }
}
