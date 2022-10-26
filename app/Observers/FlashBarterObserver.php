<?php

namespace App\Observers;

use App\Models\FlashBarter;
use App\Services\ActivityLogsService;

class FlashBarterObserver
{
    protected $service;

    public function __construct(ActivityLogsService $service)
    {
        $this->service = $service;
    }
    
    /**
     * Handle the FlashBarter "created" event.
     *
     * @param  \App\Models\FlashBarter  $flashBarter
     * @return void
     */
    public function created(FlashBarter $flashBarter)
    {
        $this->service->log_activity(model:$flashBarter, event:'requested', model_name:'Flash Barter', model_property_name: $flashBarter->post->title);
    }

    /**
     * Handle the FlashBarter "updated" event.
     *
     * @param  \App\Models\FlashBarter  $flashBarter
     * @return void
     */
    public function updated(FlashBarter $flashBarter)
    {
    }

    /**
     * Handle the FlashBarter "deleted" event.
     *
     * @param  \App\Models\FlashBarter  $flashBarter
     * @return void
     */
    public function deleted(FlashBarter $flashBarter)
    {
        //
    }

    /**
     * Handle the FlashBarter "restored" event.
     *
     * @param  \App\Models\FlashBarter  $flashBarter
     * @return void
     */
    public function restored(FlashBarter $flashBarter)
    {
        //
    }

    /**
     * Handle the FlashBarter "force deleted" event.
     *
     * @param  \App\Models\FlashBarter  $flashBarter
     * @return void
     */
    public function forceDeleted(FlashBarter $flashBarter)
    {
        //
    }
}