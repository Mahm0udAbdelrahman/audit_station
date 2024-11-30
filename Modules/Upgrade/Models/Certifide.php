<?php

namespace Modules\Upgrade\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\JobOffer\Models\JobOffer;
use Modules\Upgrade\Database\Factories\CertifideFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Certifide extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $table = 'certificates';
    protected $guarded = ['id'];

    protected static function newFactory(): CertifideFactory
    {
        return CertifideFactory::new();
    }


    public function photo()
    {
        return $this->media()->where('collection_name', 'certifide');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function jobOffer(){
        return $this->belongsTo(JobOffer::class, 'job_offer_id', 'id');
    }


}
