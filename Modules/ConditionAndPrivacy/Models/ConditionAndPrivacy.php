<?php

namespace Modules\ConditionAndPrivacy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ConditionAndPrivacy\Database\Factories\ConditionAndPrivacyFactory;

class ConditionAndPrivacy extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'description',
        'status',
    ];

    protected static function newFactory(): ConditionAndPrivacyFactory
    {
        return ConditionAndPrivacyFactory::new();
    }
}
