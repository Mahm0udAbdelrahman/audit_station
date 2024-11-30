<?php

namespace Modules\FavoriteJob\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accountant\Models\Accountant;
use Modules\FavoriteJob\Database\Factories\FavoriteJobFactory;

class FavoriteJob extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    protected static function newFactory(): FavoriteJobFactory
    {
        return FavoriteJobFactory::new();
    }


    public function accountant(){
        return $this->belongsTo(Accountant::class);
    }
}
