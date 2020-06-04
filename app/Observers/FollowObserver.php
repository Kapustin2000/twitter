<?php

namespace App\Observers;

use App\Models\Follow;
use Illuminate\Support\Facades\Log;

class FollowObserver
{
    /**
     * Handle the follow "created" event.
     *
     * @param  \App\Follow  $follow
     * @return void
     */
    public function created(Follow $follow)
    {
        Log::debug($follow);
        dd(123);
    }

    /**
     * Handle the follow "updated" event.
     *
     * @param  \App\Follow  $follow
     * @return void
     */
    public function updated(Follow $follow)
    {
        //
    }

    /**
     * Handle the follow "deleted" event.
     *
     * @param  \App\Follow  $follow
     * @return void
     */
    public function deleted(Follow $follow)
    {
        //
    }

    /**
     * Handle the follow "restored" event.
     *
     * @param  \App\Follow  $follow
     * @return void
     */
    public function restored(Follow $follow)
    {
        //
    }

    /**
     * Handle the follow "force deleted" event.
     *
     * @param  \App\Follow  $follow
     * @return void
     */
    public function forceDeleted(Follow $follow)
    {
        //
    }
}
