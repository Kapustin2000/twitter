<?php namespace App\Traits;

use App\Models\Tweet;
use Illuminate\Support\Facades\Cache;

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
    
    public function cachedTimeLine(){
        return Cache::rememberForever('users.'.auth()->user()->id.'.timeline', function () {
            return $this->timeLine();
        });
    }
 
}