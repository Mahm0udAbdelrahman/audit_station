<?php

namespace Modules\Position\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Position\Database\Factories\PositionFactory;

class Position extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'status',
    ];

    protected static function newFactory(): PositionFactory
    {
        return PositionFactory::new();
    }
}
