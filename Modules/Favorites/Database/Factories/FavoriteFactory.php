<?php

namespace Modules\Favorites\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Favorites\Models\Favorite;
use Modules\Videos\Database\Seeders\VideosDatabaseSeeder;

class FavoriteFactory extends Factory
{

    protected $model = Favorite::class;


    public function definition(): array
    {
       return [
        'user_id' => UserTypeEnum::NORMAL_USER,
        'video_id' => rand(1, VideosDatabaseSeeder::$count),
       ];

}

}

