<?php

namespace Modules\PaymentMethod\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PaymentMethod\Database\Factories\PaymentMethodFactory;

class PaymentMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'payout_account',
        'holder_name',
        'card_number',
        'cvv',
        'expire_date',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): PaymentMethodFactory
    // {
    //     //return PaymentMethodFactory::new();
    // }
}
