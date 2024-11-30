<?php

namespace Modules\Upgrade\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Upgrade\Database\Factories\UpgradeFactory;

class Upgrade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    protected static function newFactory(): UpgradeFactory
    {
        return UpgradeFactory::new();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function certifide(){
        return $this->hasMany(Certifide::class);
    }
}
