<?php

namespace App\Http\Middleware;

use App\Models\Traffic;
use App\Models\User;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TrafficWatcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $following = $request->route()->parameter('user');

        if($following->id !== user()->id){
            Traffic::firstOrCreate(
                ['user_id' => user()->id , 'profile_user_id' => $following->id, 'created_at' => Carbon::today()]
            );
        }

        return;
    }
}
