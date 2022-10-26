<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BarterUpdate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $barter)
    {
        //
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Albarter')
                    ->subject('Albarter - Barter Update ⚡')
                    ->markdown('emails.barter_update', [
                        'barter' => $this->barter,
                        'url' => route('user.barters.show', $this->barter->id),

        ]); // with params
    }
}