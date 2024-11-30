<?php

namespace Modules\Ads\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Ads\Database\Factories\AdFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ad extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;



     protected $guarded = ['id'];


    protected static function newFactory(): AdFactory
    {
        return AdFactory::new();
    }


    public function photo()
    {
        return $this->media()->where('collection_name', 'ads');
    }
}
