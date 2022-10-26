<?php

namespace App\Console\Commands;

use App\Mail\AdExpired;
use App\Models\Ad;
use App\Models\Payment;
use App\Models\BoostedPost;
use App\Models\FlashBarter;
use Illuminate\Console\Command;
use App\Mail\BoostedPostExpired;
use App\Mail\FlashBarterExpired;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HandleExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'albarter:handle_expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'An artisan command that will handle add-ons expiration (boosted post / flashbarter / ads)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $active_boosted_posts = BoostedPost::query()->whereRelation('payment', 'status', Payment::CONFIRMED)->where('is_expired', false)->get();
        $active_flash_barters = FlashBarter::query()->whereRelation('payment', 'status', Payment::CONFIRMED)->where('is_expired', false)->get();
        $active_ads = Ad::query()->whereRelation('payment', 'status', Payment::CONFIRMED)->where('is_expired', false)->get();

        if($active_boosted_posts->isNotEmpty())
        {
            foreach($active_boosted_posts as $boosted_post)
            {
                if(date('Y-m-d') > $boosted_post->date_end) // if the date today is greather / ahead of the boosted post due date
                {
                     $boosted_post->update(['is_expired' => true]); // set to expired ;
    
                    Mail::to($boosted_post->post->user->email)->send( new BoostedPostExpired($boosted_post->load(['post' => fn($query) => $query->with('category', 'user')])));  // notify user for the changes
                }
            }

        }
        
        // Log::debug();
        
        if($active_flash_barters->isNotEmpty())
        {
            Log::debug('Working here');

            foreach($active_flash_barters as $flash_barter)
            {
                if(date('Y-m-d') > $flash_barter->date_end) // if the date today is greather / ahead of the flash barter post due date
                {
                     $flash_barter->update(['is_expired' => true]); // set to expired ;
    
                    Mail::to($flash_barter->post->user->email)->send( new FlashBarterExpired($flash_barter->load(['post' => fn($query) => $query->with('category', 'user')])));  // notify user for the changes
                }
            }
            
        }

        if($active_ads->isNotEmpty())
        {
            Log::debug('Working here');

            foreach($active_ads as $ad)
            {
                if(date('Y-m-d') > $ad->date_end) // if the date today is greather / ahead of the ads due date
                {
                     $ad->update(['is_expired' => true]); // set to expired ;
    
                    Mail::to($ad->post->user->email)->send( new AdExpired($ad->load(['post' => fn($query) => $query->with('user')])));  // notify user for the changes
                }
            }
            
        }
        
        return;
    }
}