<?php

namespace Modules\SubCategory\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Blogs\Models\Blog;
use Modules\Category\Models\Category;
use Modules\SubCategory\Database\Factories\SubCategoryFactory;

class SubCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'sub_categories';

    protected $fillable = ['name', 'category_id', 'created_at', 'updated_at'];

    protected static function newFactory(): SubCategoryFactory
    {
        return SubCategoryFactory::new();
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
