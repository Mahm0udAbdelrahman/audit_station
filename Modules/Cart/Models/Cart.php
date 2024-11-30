<?php

namespace Modules\Cart\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Cart\Database\Factories\CartFactory;
use Modules\Course\Models\Course;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'quantity',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): CartFactory
    // {
    //     //return CartFactory::new();
    // }
}
