<?php

namespace Modules\Language\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Language\Database\Factories\LanguageFactory;

class Language extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'status',
    ];

    protected static function newFactory(): LanguageFactory
    {
        return LanguageFactory::new();
    }
}
