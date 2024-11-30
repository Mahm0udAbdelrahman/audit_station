<?php

namespace Modules\JobOffer\Models;

use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Company\Models\Company;
use Modules\JobOffer\Database\Factories\JobOfferFactory;
use Modules\Upgrade\Models\Certifide ;

class JobOffer extends Model
{
    use HasFactory , Searchable, PaginationTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    public $table = 'job_offers';

    protected static function newFactory(): JobOfferFactory
    {
        return JobOfferFactory::new();
    }


    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function certificates(){
        return $this->hasMany(Certifide::class, 'job_offer_id', 'id');
    }


}
