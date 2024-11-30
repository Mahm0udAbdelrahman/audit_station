<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

use Spatie\MediaLibrary\InteractsWithMedia;

class Video extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'video_sections';
    protected $fillable = [
        'section_id',
        'video_name',
        'duration',
        'status',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

   public function video()
   {
     return $this->media()->where('collection_name', 'videos');
   }
}
