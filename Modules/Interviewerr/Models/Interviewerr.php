<?php

namespace Modules\Interviewerr\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Models\Admin;
use Modules\Interviewerr\Database\Factories\InterviewerrFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;

class Interviewerr extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia , Searchable, PaginationTrait;



    protected $guarded = ['id'];
    public $table = 'interviewerrs';

    protected static function newFactory(): InterviewerrFactory
    {
        return InterviewerrFactory::new();
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


    public function availability(){
        return $this->hasMany(Availability::class);
    }
}
