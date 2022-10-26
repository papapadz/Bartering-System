<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdExpired extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $ad)
    {
        //
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Albarter')
                    ->subject('Albarter - Advertisement Expired ⚡')
                    ->markdown('emails.ad_expired', [
                        'ad' => $this->ad,
                        'url' => route('user.ads.index'),

        ]); // with params
    }
}