<?php namespace App\Traits;

use App\Models\Follow;
use App\Models\User;
use App\Notifications\NewFollower;
use Illuminate\Support\Facades\Auth;

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

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'following_user_id',
            'user_id'
        );
    }

    public function follow(User $user)
    {
        $follower = $this->follows()->toggle($user);
        
        if(count($follower['attached']) > 0 ){
            $user->notify(new NewFollower($this));
        }
        
        return $follower; 
    }

    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function commonFollowers(){
        return $this->followers()->whereIn('user_id', Auth::user()->follows);
    }
    
}