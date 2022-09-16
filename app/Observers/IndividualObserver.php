<?php

namespace App\Observers;

use App\Models\Individual;

class IndividualObserver
{
    /**
     * Handle the Individual "created" event.
     *
     * @param  \App\Models\Individual $individual
     * @return void
     */
    public function created(Individual $individual)
    {
        if(auth()->check()){
            $individual->tenant_id = auth()->id();
            $individual->save();
        }
    }

    /**
     * Handle the Individual "updated" event.
     *
     * @param  \App\Models\Individual  $individual
     * @return void
     */
    public function updated(Individual $individual)
    {
        //
    }

    /**
     * Handle the Individual "deleted" event.
     *
     * @param  \App\Models\Individual  $individual
     * @return void
     */
    public function deleted(Individual $individual)
    {
        //
    }

    /**
     * Handle the Individual "restored" event.
     *
     * @param  \App\Models\Individual  $individual
     * @return void
     */
    public function restored(Individual $individual)
    {
        //
    }

    /**
     * Handle the Individual "force deleted" event.
     *
     * @param  \App\Models\Individual  $individual
     * @return void
     */
    public function forceDeleted(Individual $individual)
    {
        //
    }
}
