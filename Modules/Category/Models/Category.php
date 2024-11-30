<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Blogs\Models\Blog;
use Modules\Category\Database\Factories\CategoryFactory;
use Modules\Course\Models\Course;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Modules\SubCategory\Models\SubCategory;
use Modules\Videos\Models\Video;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable, PaginationTrait;


    protected $fillable = [
        'name',
    ];

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }



    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function videos()
    {
        return $this->hasManyThrough(Video::class, Course::class);
    }

    public function photo()
    {
        return $this->media()->where('collection_name', 'photo');
    }
}
