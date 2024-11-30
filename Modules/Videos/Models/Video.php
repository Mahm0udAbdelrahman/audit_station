<?php

namespace Modules\Videos\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Models\Category;
use Modules\Comments\Models\Comment;
use Modules\Course\Models\Course;
use Modules\Favorites\Models\Favorite;
use Modules\Instructor\Models\Instructor;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Modules\Videos\Database\Factories\VideoFactory;

class Video extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia ,Searchable, PaginationTrait;



    protected $guarded = ['id'];



    protected static function newFactory(): VideoFactory
    {
        return VideoFactory::new();
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'video_id', 'user_id');
    }



    public function photo()
    {
        return $this->media()->where('collection_name', 'video');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }




}
