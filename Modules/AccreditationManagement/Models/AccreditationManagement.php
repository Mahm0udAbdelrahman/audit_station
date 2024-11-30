<?php

namespace Modules\AccreditationManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AccreditationManagement\Database\Factories\AccreditationManagementFactory;

class AccreditationManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'grade',
        'minimum_degree',
        'maximum_degree',
    ];

    // protected static function newFactory(): AccreditationManagementFactory
    // {
    //     //return AccreditationManagementFactory::new();
    // }
}
