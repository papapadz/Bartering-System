<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BoostedPostExpired extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $boosted_post)
    {
        //
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Albarter')
                    ->subject('Albarter - Boosted Post Expired ⚡')
                    ->markdown('emails.boosted_post_expired', [
                        'boosted_post' => $this->boosted_post,
                        'url' => route('user.boosted_posts.index'),

        ]); // with params
    }
}