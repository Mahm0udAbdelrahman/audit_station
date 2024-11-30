<?php

namespace Modules\Position\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Position\Models\Position;

class PositionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        Position::create([
            'title'=> 'CEO'
        ]);
        Position::create([
            'title' => 'Financial manager'
        ]);
        Position::create([
            'title' => 'Chairman of the Board of Directors'
        ]);
        Position::create([
            'title' => 'Team leader'
        ]);
        Position::create([
            'title' => 'Project Manager'
        ]);

    }
}
