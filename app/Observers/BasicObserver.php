<?php

namespace App\Observers;

use App\Models\Basic;

class BasicObserver
{
    /**
     * Handle the Basic "created" event.
     *
     * @param  \App\Models\Basic  $basic
     * @return void
     */
    public function created(Basic $basic)
    {
        if(auth()->check()){
            $basic->user_id = auth()->id();
            $basic->save();
        }
    }

    /**
     * Handle the Basic "updated" event.
     *
     * @param  \App\Models\Basic  $basic
     * @return void
     */
    public function updated(Basic $basic)
    {
        //
    }

    /**
     * Handle the Basic "deleted" event.
     *
     * @param  \App\Models\Basic  $basic
     * @return void
     */
    public function deleted(Basic $basic)
    {
        //
    }

    /**
     * Handle the Basic "restored" event.
     *
     * @param  \App\Models\Basic  $basic
     * @return void
     */
    public function restored(Basic $basic)
    {
        //
    }

    /**
     * Handle the Basic "force deleted" event.
     *
     * @param  \App\Models\Basic  $basic
     * @return void
     */
    public function forceDeleted(Basic $basic)
    {
        //
    }
}
