<?php

namespace Modules\BuyCoins\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\BuyCoins\Database\Factories\BuyCoinsFactory;

class BuyCoins extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'coins',
        'doller'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): BuyCoinsFactory
    // {
    //     //return BuyCoinsFactory::new();
    // }
}
