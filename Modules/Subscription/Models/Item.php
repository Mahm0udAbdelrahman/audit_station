<?php

namespace Modules\Subscription\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Subscription\Database\Factories\ItemFactory;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'description'
    ];

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'item_subscriptions');
    }

    // protected static function newFactory(): ItemFactory
    // {
    //     //return ItemFactory::new();
    // }
}
