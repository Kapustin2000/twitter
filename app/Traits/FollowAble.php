<?php namespace App\Traits;

use App\Models\Follow;

trait FollowAble
{

    public function follows()
    {
        return $this->belongsToMany(Follow::class);
    }
    
}