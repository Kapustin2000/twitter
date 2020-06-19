<?php namespace App\Traits;

use App\Models\Tweet;

trait HasTweets
{
  

    public function timeLine(){
        $following = $this->follows->pluck('id');

        return Tweet::whereIn('user_id',$following)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->with('user')
            ->orderByDesc('id')
            ->get();
    }
 
}