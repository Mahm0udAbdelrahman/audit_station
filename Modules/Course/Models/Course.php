<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Models\Category;
use Modules\Comments\Models\Comment;
use Modules\Course\Database\Factories\CourseFactory as FactoriesCourseFactory;
use Modules\Course\Models\Section;
use Modules\Course\Database\Factories\CourseFactory;
use Modules\Favorites\Models\Favorite;
use Modules\Instructor\Models\Instructor;
use Modules\Language\Models\Language;
use Modules\Reviews\Models\Review;
use Modules\Videos\Models\Video;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;






     protected $guarded = ['id'];

    protected static function newFactory()
    {
        return CourseFactory::new();
    }


    public function photo()
    {
        return $this->media()->where('collection_name', 'photo');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }


    public function videos()
    {
        return $this->hasMany(Video::class);
    }


    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}

}
