<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Laravel\Sanctum\HasApiTokens;
use Modules\Accountant\Models\Accountant;
use Modules\BecomeCompany\Models\BecomeCompany;
use Modules\Favorites\Models\Favorite;
use Modules\Instructor\Models\Instructor;
use Modules\Interviewerr\Models\Interviewerr;
use Modules\Question\Models\Question as ModelsQuestion;
use Modules\Questions\Models\Question;
use Modules\Reviews\Models\Review;
use Modules\Upgrade\Models\Certifide;
use Modules\Upgrade\Models\Upgrade;
use Modules\Videos\Models\Video;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, HasApiTokens ,InteractsWithMedia ,  HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable =
    [

        'name',
        'email',
        'password',
        'phone',
        'status',
        'type',
        'remember_token',
        'email_verified_at',
        'coins',
        'gender',
        'age',
        'country',
        'city',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'linkedin',
        'github',
        'provider_id',
        'provider_name',
        'provider_token',

    ];
    protected $guard_name = 'web';
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_image');
        $this->addMediaCollection('employee_image');

    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'provider_token'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function setProviderTokenAttribute($value)
    {
        $this->attributes['provider_token'] = Crypt::encrypt($value);
    }

    public function getProviderTokenAttribute($value)
    {
        return Crypt::decrypt($value);
    }



    public function interviewerr()
    {
        return $this->hasMany(Interviewerr::class);
    }

    public function instructor()
    {
        return $this->hasMany(Instructor::class);
    }

    public function accountant()
    {
        return $this->hasMany(Accountant::class);
    }

    public function questions()
    {
        return $this->hasMany(ModelsQuestion::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function becomeCompany(){
        return $this->hasMany(BecomeCompany::class);
    }


    public function favorites()
    {
        return $this->belongsToMany(Video::class, 'favorites', 'user_id', 'video_id');
    }

    public function upgrades()
    {
        return $this->hasMany(Upgrade::class);
    }


    public function certifide()
{
    return $this->hasOne(Certifide::class);
}

public function isAdmin()
{
    return $this->role === 'admin';
}

}
