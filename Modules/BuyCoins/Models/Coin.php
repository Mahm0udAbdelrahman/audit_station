<?php

namespace Modules\BuyCoins\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\BuyCoins\Database\Factories\CoinFactory;

class Coin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'coins',
        'doller'
    ];
    protected static function newFactory(): CoinFactory
    {
        return CoinFactory::new();
    }
}
