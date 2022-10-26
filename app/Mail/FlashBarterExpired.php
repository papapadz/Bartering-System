<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FlashBarterExpired extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $flash_barter)
    {
        //
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Albarter')
                    ->subject('Albarter - Flash Barter Expired ⚡')
                    ->markdown('emails.flash_barter_expired', [
                        'flash_barter' => $this->flash_barter,
                        'url' => route('user.flash_barters.index'),

        ]); // with params
    }
}