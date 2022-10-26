<?php

namespace App\Observers;

use App\Models\Barter;
use App\Services\ActivityLogsService;

class BarterObserver
{
    protected $service;

    public function __construct(ActivityLogsService $service)
    {
        $this->service = $service;
    }
    
    /**
     * Handle the Barter "created" event.
     *
     * @param  \App\Models\Barter  $barter
     * @return void
     */
    public function created(Barter $barter)
    {
        $this->service->log_activity(model:$barter, event:'offered', model_name:'Item', model_property_name: $barter->bartered_post->title . ' to posted item '. $barter->post->title, conjunction:'an');
    }

    /**
     * Handle the Barter "updated" event.
     *
     * @param  \App\Models\Barter  $barter
     * @return void
     */
    public function updated(Barter $barter)
    {
        //
    }

    /**
     * Handle the Barter "deleted" event.
     *
     * @param  \App\Models\Barter  $barter
     * @return void
     */
    public function deleted(Barter $barter)
    {
        $this->service->log_activity(model:$barter, event:'removed an offered', model_name:'Item', model_property_name: $barter->bartered_post->title . ' from posted item '. $barter->post->title, conjunction:'');
    }

    /**
     * Handle the Barter "restored" event.
     *
     * @param  \App\Models\Barter  $barter
     * @return void
     */
    public function restored(Barter $barter)
    {
        //
    }

    /**
     * Handle the Barter "force deleted" event.
     *
     * @param  \App\Models\Barter  $barter
     * @return void
     */
    public function forceDeleted(Barter $barter)
    {
        //
    }
}