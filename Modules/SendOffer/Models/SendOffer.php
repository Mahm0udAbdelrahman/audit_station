<?php

namespace Modules\SendOffer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Company\Models\Company;
use Modules\SendOffer\Database\Factories\SendOfferFactory;

class SendOffer extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    protected static function newFactory(): SendOfferFactory
    {
        return SendOfferFactory::new();
    }


    public function company(){
        return $this->belongsTo(Company::class);
    }

    
}
