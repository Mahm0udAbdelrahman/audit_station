<?php

namespace Modules\Faqs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Faqs\Database\Factories\FaqFactory;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */

     protected $guarded = ['id'];

    protected $fillable = [];

    protected static function newFactory(): FaqFactory
    {
        return FaqFactory::new();
    }
}
