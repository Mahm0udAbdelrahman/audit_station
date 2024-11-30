<?php

namespace Modules\Reviews\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Models\Course;
use Modules\Reviews\Database\Factories\ReviewFactory;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];
    // protected $fillable = [];

    protected static function newFactory(): ReviewFactory
    {
        return ReviewFactory::new();
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
