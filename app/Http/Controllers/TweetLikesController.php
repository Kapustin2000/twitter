<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $tweet->like(user());

        return back();
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->dislike(user());

        return back();

    }
}
