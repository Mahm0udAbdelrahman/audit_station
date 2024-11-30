<?php

namespace Modules\Blogs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Author\Models\Author;
use Modules\Blogs\Database\Factories\BlogsFactory;
use Modules\Category\Models\Category;
use Modules\Comments\Models\Comment;
use Modules\SubCategory\Models\SubCategory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;


class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable, PaginationTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'blogs';

    protected $fillable = [
        'title',
     'description',
     'facebook',
     'instagram',
     'twitter',
     'linkedin',
     'youtube',
     'tiktok',
    'tags',
    'category_id',
    'author_id',
    'sub_category_id'];

    protected static function newFactory(): BlogsFactory
    {
        return BlogsFactory::new();
    }

    public function photo()
    {
        return $this->media()->where('collection_name', 'photo');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
