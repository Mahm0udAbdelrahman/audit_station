<?php

namespace Modules\BuyCoins\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\BuyCoins\Models\Coin;

class CoinsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coin::factory(100)->create();
    }
}
