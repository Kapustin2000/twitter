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
        $user = Auth::user();
        $following = $user->follows->pluck('id');
        $data  = User::whereNotIn('id',$following)
            ->orWhere('id', '!=' ,$user->id)
            ->orderByDesc('id')
            ->get();
        return view('explore.explore', ['users' => $data]);
    }
}
