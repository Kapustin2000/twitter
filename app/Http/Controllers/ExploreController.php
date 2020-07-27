<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class ExploreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $recentlyVisited = user()->getRecentlyVisitedProfiles(4);

        $following = user()->follows->pluck('id');
 
        $users  = User::whereNotIn('id', $following->merge($recentlyVisited->pluck('id'), user()->id))->get();
        
        return view('explore.explore', ['users' => $users, 'recentlyVisited' => $recentlyVisited]);
    }
}
