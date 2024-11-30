<?php

namespace Modules\Author\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Author\Database\Factories\AuthorFactory;
use Modules\Blogs\Models\Blog;
use Modules\Comments\Models\Comment;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Author extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'authors';

    protected $fillable = ['name', 'title'];

    protected static function newFactory(): AuthorFactory
    {
        return AuthorFactory::new();
    }

    public function photo()
    {
        return $this->media()->where('collection_name', 'author');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
