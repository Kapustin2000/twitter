<?php namespace App\Traits;

use App\Models\Follow;
use App\Models\User;
use App\Notifications\NewFollower;
use Illuminate\Support\Facades\Auth;

trait FollowAble
{
    public function follow(User $user)
    {
        $follower = $this->follows()->toggle($user);
        
        if(count($follower['attached']) > 0 ){
            $user->notify(new NewFollower($this));
        }
        
        return $follower; 
    }
    
    public function unfollow(User $user) {
        return $this->follow($user);
    }

    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function commonFollowers(){
       return $this->followers()->whereIn('user_id', user()->follows()->pluck('follows.following_user_id'))->get();
    }
    
}