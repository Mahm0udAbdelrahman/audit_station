<?php

namespace Modules\Favorites\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Models\Course;
use Modules\Favorites\Database\Factories\FavoriteFactory;
use Modules\Videos\Models\Video;

class Favorite extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

   

    protected static function newFactory(): FavoriteFactory
    {
        return FavoriteFactory::new();
    }


    public function favoritable()
    {
        return $this->morphTo();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    // في Favorite.php
    public function users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'video_id', 'user_id');
    }
}
