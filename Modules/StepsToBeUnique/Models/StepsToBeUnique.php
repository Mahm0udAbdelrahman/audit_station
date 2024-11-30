<?php

namespace Modules\StepsToBeUnique\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\StepsToBeUnique\Database\Factories\StepsToBeUniqueFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class StepsToBeUnique extends Model implements HasMedia
{
    use InteractsWithMedia , HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'number_of_the_step',
        'photo',
    ];

    // protected static function newFactory(): StepsToBeUniqueFactory
    // {
    //     //return StepsToBeUniqueFactory::new();
    // }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photos');
    }
}
