<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(User $user)
    {
         Auth::user()->follow($user);

        return back();
    }

    public function follows(User $user)
    {
        return view('follow.follows',['follows' =>  $user->follows()->paginate(50)]);
    }

    public function followers(User $user)
    { 
        return view('follow.followers',['followers' => $user->followers()->paginate(50)]);
    }
    
}
