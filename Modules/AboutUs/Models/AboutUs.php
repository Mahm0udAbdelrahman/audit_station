<?php

namespace Modules\AboutUs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AboutUs\Database\Factories\AboutUsFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutUs extends Model implements  HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
     /**
     * The attributes that are mass assignable.
     */
    protected $table = 'about_us';
    protected $fillable = [
        'title',
        'description',
        'youTube_link',

    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about_us_image');
    }

    protected static function newFactory(): AboutUsFactory
    {
        return AboutUsFactory::new();
    }
}
