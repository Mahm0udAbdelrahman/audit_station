<?php

namespace Modules\AboutUs\Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\AboutUs\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       AboutUs::create([
            'title' => 'About Our Company',
            'description' => 'This is a description of our company. We provide various services and products to our customers.',
            'youTube_link' => 'https://www.youtube.com/live/zUfWGqFub5Q?si=YGYBGh9sLuon8YwJ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
