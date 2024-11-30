<?php

namespace Modules\AccountantOffer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accountant\Models\Accountant;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Modules\AccountantOffer\Database\Factories\AccountantOfferFactory;

class AccountantOffer extends Model
{
    use HasFactory, Searchable, PaginationTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];
    // protected $fillable = [];

    protected static function newFactory(): AccountantOfferFactory
    {
        return AccountantOfferFactory::new();
    }


    public function accountant(){
        return $this->belongsTo(Accountant::class);
    }
}
