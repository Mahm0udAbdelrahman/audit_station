<?php

namespace Modules\Subscription\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Subscription\Database\Factories\SubscriptionFactory;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'status',
        'amount_by_coins',
        'amount_by_dollar',
        'duration',
        'name'

    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_subscriptions');
    }

    // protected static function newFactory(): SubscriptionFactory
    // {
    //     //return SubscriptionFactory::new();
    // }
}
