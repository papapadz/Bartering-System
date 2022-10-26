<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemoveItemOffered extends Mailable
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
                    ->subject('Albarter - Removed Item Offered ⚡')
                    ->markdown('emails.remove_item_offered', [
                        'barter' => $this->barter,
                        'url' => route('user.posts.show', $this->barter->post->slug),

        ]); // with params
    }
}