<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $user = user();
        $following = $user->follows->pluck('id');
        $data  = User::whereNotIn('id',$following)
            ->withCount('views')
            ->orWhere('id', '!=' ,$user->id)
            ->orderByDesc('views_count')
            ->get();
        return view('explore.explore', ['users' => $data]);
    }
}
