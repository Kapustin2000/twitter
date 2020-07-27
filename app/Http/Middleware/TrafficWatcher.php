<?php

namespace App\Http\Middleware;

use App\Models\Traffic;
use App\Models\User;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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
        $profile = $request->route()->parameter('user');

        if($profile->id !== user()->id){
            Redis::zAdd('user.'.user()->id.'.visited', time(), $profile->id);

            Traffic::firstOrCreate(
                ['user_id' => user()->id , 'profile_user_id' => $profile->id, 'created_at' => Carbon::today()]
            );
        }

        return;
    }
}
