<?php

namespace Modules\Auth\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Auth\Database\Factories\RefreshTokenFactory;

class RefreshToken extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'token',
        'user_id',
        'token_expires_at',
    ];

    public function casts()
    {
        return [
            'token_expires_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): RefreshTokenFactory
    // {
    //     //return RefreshTokenFactory::new();
    // }
}
