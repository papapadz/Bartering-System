<?php

namespace App\Observers;

use App\Models\BoostedPost;
use App\Services\ActivityLogsService;

class BoostedPostObserver
{
    protected $service;

    public function __construct(ActivityLogsService $service)
    {
        $this->service = $service;
    }
    
    /**
     * Handle the BoostedPost "created" event.
     *
     * @param  \App\Models\BoostedPost  $boostedPost
     * @return void
     */
    public function created(BoostedPost $boostedPost)
    {
        $this->service->log_activity(model:$boostedPost, event:'requested', model_name:'Boosted Post', model_property_name: $boostedPost->post->title);
        
    }

    /**
     * Handle the BoostedPost "updated" event.
     *
     * @param  \App\Models\BoostedPost  $boostedPost
     * @return void
     */
    public function updated(BoostedPost $boostedPost)
    {
        //
    }

    /**
     * Handle the BoostedPost "deleted" event.
     *
     * @param  \App\Models\BoostedPost  $boostedPost
     * @return void
     */
    public function deleted(BoostedPost $boostedPost)
    {
        //
    }

    /**
     * Handle the BoostedPost "restored" event.
     *
     * @param  \App\Models\BoostedPost  $boostedPost
     * @return void
     */
    public function restored(BoostedPost $boostedPost)
    {
        //
    }

    /**
     * Handle the BoostedPost "force deleted" event.
     *
     * @param  \App\Models\BoostedPost  $boostedPost
     * @return void
     */
    public function forceDeleted(BoostedPost $boostedPost)
    {
        //
    }
}