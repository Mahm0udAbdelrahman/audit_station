<?php

namespace Modules\OurTeam\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\OurTeam\Database\Factories\OurTeamFactory;
use Modules\Position\Models\Position;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class OurTeam extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable =
    [
        'name',
        'description',
        'status',
        'position_id',
        'facebook',
        'instagram',
        'tiktok',
        'twitter',
        'youtube',
        'whatsapp',
        'linkedin',
        'github',

    ];

    protected static function newFactory(): OurTeamFactory
    {
        return OurTeamFactory::new();
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('OurTeams');
    }
}
