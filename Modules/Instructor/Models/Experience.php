<?php

namespace Modules\Instructor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Instructor\Database\Factories\ExperienceFactory;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;

class Experience extends Model
{
    use HasFactory, Searchable, PaginationTrait;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    protected static function newFactory(): ExperienceFactory
    {
        return ExperienceFactory::new();
    }


    public function instrucor(){
        return $this->belongsTo(Instructor::class);
    }
}
