<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Models\Setting;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'language' => fake()->randomElement(['en', 'ar','fr']),
            'mood' => fake()->randomElement(['light', 'dark']),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'twitter' => fake()->url(),
            'linkedin' => fake()->url(),
            'youtube' => fake()->url(),
            'tiktok' => fake()->url(),
            'snapchat' => fake()->url(),
            'app_store' => fake()->url(),
            'google_play' => fake()->url(),
            'head_quarters' => fake()->word(),
            'our_branches' => fake()->word(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
        ]);
    }
}
