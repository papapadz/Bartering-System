<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer('*', function ($view) {
            if (Auth::user() && auth()->user()->hasRole('admin')) {

                $view->with('new_requests', Activity::whereIn('subject_type', ['App\Models\Ad', 'App\Models\BoostedPost', 'App\Models\FlashBarter'])
                ->where('causer_id', '!=', 1)
                ->latest()
                ->take(5)
                ->get()); // list of latest add-ons request (Ad | Boosted Post | Flash Barter)
            } 
        });
    }
}