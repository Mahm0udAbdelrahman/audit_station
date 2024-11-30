<?php

namespace Modules\BecomeCompany\Models;

use App\Models\User;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\BecomeCompany\Database\Factories\BecomeCompanyFactory;
use Modules\Company\Models\Company;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BecomeCompany extends Model implements HasMedia
{
    use HasFactory , Searchable, PaginationTrait,InteractsWithMedia;




    protected $guarded = ['id'];

    protected static function newFactory(): BecomeCompanyFactory
    {
        return BecomeCompanyFactory::new();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->media()->where('collection_name', 'photo');
    }

  
}
