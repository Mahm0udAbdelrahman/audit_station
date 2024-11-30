<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable =
    [
        'facebook',
        'whatsapp',
        'twitter',
        'instagram',
        'youtube',
        'linkedin',
        'github',
        'user_id'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
