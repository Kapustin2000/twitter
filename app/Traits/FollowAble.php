<?php namespace App\Traits;

use App\Models\Follow;
use App\Models\User;

trait FollowAble
{

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }
    
}