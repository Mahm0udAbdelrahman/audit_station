<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Database\Factories\SectionFactory;

class Section extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'course_id',
        'section_name',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

}
