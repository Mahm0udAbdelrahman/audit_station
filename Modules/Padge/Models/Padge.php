<?php

namespace Modules\Padge\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Color\Models\Color;
use Modules\Padge\Database\Factories\PadgeFactory;

class Padge extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'type',
        'color_id',
        'status',

    ];

    public function color()
    {
        return $this->belongsTo(Color::class,'color_id','id');
    }

    protected static function newFactory(): PadgeFactory
    {
       return PadgeFactory::new();
    }
}
