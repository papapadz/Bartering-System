<?php

namespace App\Observers;

use App\Models\Ad;
use App\Services\ActivityLogsService;

class AdObserver
{
    protected $service;

    public function __construct(ActivityLogsService $service)
    {
        $this->service = $service;
    }
    
    /**
     * Handle the Ad "created" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function created(Ad $ad)
    {
        $this->service->log_activity(model:$ad, event:'requested', model_name:'Advertisement', model_property_name: $ad->title);
    }

    /**
     * Handle the Ad "updated" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function updated(Ad $ad)
    {
        //
    }

    /**
     * Handle the Ad "deleted" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function deleted(Ad $ad)
    {
        //
    }

    /**
     * Handle the Ad "restored" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function restored(Ad $ad)
    {
        //
    }

    /**
     * Handle the Ad "force deleted" event.
     *
     * @param  \App\Models\Ad  $ad
     * @return void
     */
    public function forceDeleted(Ad $ad)
    {
        //
    }
}