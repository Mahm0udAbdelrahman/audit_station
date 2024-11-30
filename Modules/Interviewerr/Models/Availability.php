<?php

namespace Modules\Interviewerr\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Interviewerr\Database\Factories\AvailabilityFactory;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;

class Availability extends Model
{
    use HasFactory, Searchable, PaginationTrait;


    protected $guarded = ['id'];

    protected static function newFactory(): AvailabilityFactory
    {
        return AvailabilityFactory::new();
    }


    public function interviewerr(){
        return $this->belongsTo(interviewerr::class);
    }
}
