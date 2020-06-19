<?php

namespace App\Models;

use App\Traits\FollowAble;
use App\Traits\HasImages;
use App\Traits\HasRoles;
use App\Traits\HasTweets;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasTweets, FollowAble, HasImages;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar', 'banner', 'sex', 'birthday', 'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    const SEXES = [
        'man' => 1,
        'woman' => 2
    ];

    public function path($append = '')
    {
        $path = route('profile', $this);

        return $append ? "{$path}/{$append}" : $path;
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function views()
    {
        return $this->hasMany(
            Traffic::class, 'profile_user_id', 'id'
        );
    }


    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'following_user_id',
            'user_id'
        );
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function abilities()
    {
        return $this->roles
            ->map->abilities
            ->flatten()->pluck('name')->unique();
    }



    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
 
}
