<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetsLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        return $tweet->like(Auth::user()); 
    }

    public function destroy(Tweet $tweet)
    {
        return$tweet->dislike(Auth::user()); 
    }
}
