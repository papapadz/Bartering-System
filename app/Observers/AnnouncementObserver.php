<?php

namespace App\Observers;

use App\Models\Announcement;
use App\Services\ActivityLogsService;

class AnnouncementObserver
{
    protected $service;

    public function __construct(ActivityLogsService $service)
    {
        $this->service = $service;
    }
    
    
    /**
     * Handle the Announcement "created" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function created(Announcement $announcement)
    {
        $this->service->log_activity(model:$announcement, event:'added', model_name:'Announcement', model_property_name: $announcement->title);
    }

    /**
     * Handle the Announcement "updated" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function updated(Announcement $announcement)
    {
        $this->service->log_activity(model:$announcement, event:'updated', model_name:'Announcement', model_property_name: $announcement->title);
    }

    /**
     * Handle the Announcement "deleted" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function deleted(Announcement $announcement)
    {
        $this->service->log_activity(model:$announcement, event:'deleted', model_name:'Announcement', model_property_name: $announcement->title);
    }

    /**
     * Handle the Announcement "restored" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function restored(Announcement $announcement)
    {
        //
    }

    /**
     * Handle the Announcement "force deleted" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function forceDeleted(Announcement $announcement)
    {
        //
    }
}