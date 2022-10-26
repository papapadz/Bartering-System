<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $observers = [

        /** Administrator */
            \App\Models\Announcement::class => [
                \App\Observers\AnnouncementObserver::class
            ],
            \App\Models\PaymentMethod::class => [
                \App\Observers\PaymentMethodObserver::class
            ],
            \App\Models\Category::class => [
                \App\Observers\CategoryObserver::class
            ],
      
        /** End Administrator */


        /** User */
            \App\Models\Ad::class => [
                \App\Observers\AdObserver::class
            ],
            \App\Models\Barter::class => [
                \App\Observers\BarterObserver::class
            ],
            \App\Models\BoostedPost::class => [
                \App\Observers\BoostedPostObserver::class
            ],
            \App\Models\Comment::class => [
                \App\Observers\CommentObserver::class
            ],
            \App\Models\FlashBarter::class => [
                \App\Observers\FlashBarterObserver::class
            ],
            \App\Models\Like::class => [
                \App\Observers\LikeObserver::class
            ],
            \App\Models\Post::class => [
                \App\Observers\PostObserver::class
            ],
        /** End User */

    ];

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}