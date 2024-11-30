<?php

namespace Modules\Instructor\Models;

use App\Models\User;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Admin;
use Modules\Course\Models\Course;
use Modules\Instructor\Database\Factories\InstructorFactory;
use Modules\Videos\Models\Video ;

// use Modules\Users\Models\User;

class Instructor extends Model
{
                     // لتفعيل البحث فى الجدول
                     //    1           2
    use HasFactory, Searchable, PaginationTrait;


    protected $guarded = ['id'];

    protected $fillable = [];

    protected static function newFactory(): InstructorFactory
    {
        return InstructorFactory::new();
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }


    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function photo()
    {
        return $this->media()->where('collection_name', 'photo');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }


    public function scopeSearchByRelation(Builder $query, string $relation, array $fields)
    {
        if (request()->has('search') && request('search') !== '') {
            $query->whereHas($relation, function ($q) use ($fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . request('search') . '%');
                }
            });
        }

        return $query;
    }

}
