<?php

namespace Modules\Company\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accountant\Models\Accountant;
use Modules\BecomeCompany\Models\BecomeCompany;
use Modules\Company\Database\Factories\CompanyFactory;
use Modules\JobOffer\Models\JobOffer;
use Modules\SendOffer\Models\SendOffer;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable, PaginationTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];


    protected static function newFactory(): CompanyFactory
    {
        return CompanyFactory::new();
    }


    public function photo()
    {
        return $this->media()->where('collection_name', 'certificate');
    }

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }

    public function sendOffer(){
        return $this->hasMany(SendOffer::class);
    }

    public function accountants()
    {
        return $this->hasMany(Accountant::class);
    }
}
