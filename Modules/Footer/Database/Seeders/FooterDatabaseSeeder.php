<?php

namespace Modules\Footer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Footer\Models\Footer;

class FooterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Footer::create([
            'facebook' => fake()->url,
            'instagram' => fake()->url,
            'twitter' => fake()->url,
            'linkedin' => fake()->url,
            'youtube' => fake()->url,
            'tiktok' => fake()->url,
            'snapchat' => fake()->url,
            'app_store' => fake()->url,
            'google_play' => fake()->url,
        ]);
    }
}
