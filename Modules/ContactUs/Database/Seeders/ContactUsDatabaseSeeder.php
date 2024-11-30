<?php

namespace Modules\ContactUs\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ContactUs\Models\ContactUs;

class ContactUsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactUs::factory(100)->create();
     }
}
