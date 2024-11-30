<?php

namespace Modules\Comments\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Author\Models\Author;
use Modules\Blogs\Models\Blog;
use Modules\Comments\Database\Factories\CommentFactory;
use Modules\Videos\Models\Video;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Comment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $guarded = ['id'];

    protected static function newFactory(): CommentFactory
    {
        return CommentFactory::new();
    }

    public function photo()
    {
        return $this->media()->where('collection_name', 'author');
    }

    public function blog()
    {

        return $this->hasMany(Blog::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }


    public function videos()
{
    return $this->hasMany(Video::class);
}




}
