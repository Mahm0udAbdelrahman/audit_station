<?php

namespace Modules\Accountant\Models;

use App\Models\User;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Accountant\Database\Factories\AccountantFactory;
use Modules\AccountantOffer\Models\AccountantOffer;
use Modules\Admin\Models\Admin;
use Modules\Company\Models\Company;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Accountant extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia , Searchable, PaginationTrait;




    protected $guarded = ['id'];

    protected static function newFactory(): AccountantFactory
    {
        return AccountantFactory::new();
    }


    public function photo()
    {
        return $this->media()->where('collection_name', 'certificate');
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function company(){
        return $this->hasMany(Company::class);
    }

    public function accountantOffer(){
        return $this->hasMany(AccountantOffer::class);
    }
}
