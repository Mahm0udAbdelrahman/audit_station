<?php

namespace Modules\Statistic\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Statistic\Database\Factories\StatisticFactory;

class Statistic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'number_of',
        'title'
    ];

    // protected static function newFactory(): StatisticFactory
    // {
    //     //return StatisticFactory::new();
    // }
}
