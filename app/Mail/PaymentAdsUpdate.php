<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentAdsUpdate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $payment)
    {
    }
   
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Albarter')
                    ->subject('Albarter - Advertisement Update ⚡')
                    ->markdown('emails.payment_ads_update', [
                        'payment' => $this->payment,
                        'url' => route('user.ads.index'),

        ]); // with params
    }
}