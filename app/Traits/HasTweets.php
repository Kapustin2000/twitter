<?php namespace App\Traits;

use App\Models\Tweet;

trait HasTweets
{
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    } 
 
}