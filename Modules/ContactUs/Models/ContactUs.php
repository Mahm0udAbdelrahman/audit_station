<?php

namespace Modules\ContactUs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ContactUs\Database\Factories\ContactUsFactory;

class ContactUs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'email',
        'name',
        'subject',
        'message',
        'status',
    ];

    protected static function newFactory(): ContactUsFactory
    {
        return ContactUsFactory::new();
    }
}
