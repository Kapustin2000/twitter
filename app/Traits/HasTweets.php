<?php namespace App\Traits;

use App\Models\Tweet;

trait HasTweets
{
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function timeLine(){
        $following = $this->follows->pluck('id');

        return Tweet::whereIn('id',$following)
            ->with('user')
            ->orWhere('user_id', $this->id)
            ->orderByDesc('id')
            ->get();
    }
 
}