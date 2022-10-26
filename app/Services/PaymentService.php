<?php

namespace App\Services;

use App\Mail\PaymentAdsUpdate;
use App\Models\User;
use App\Models\Payment;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentBoostedPostUpdate;
use App\Mail\PaymentFlashBarterUpdate;
use App\Mail\PaymentSubscriptionUpdate;

class PaymentService extends ImageUploadService 
{
    public function __construct(public TextService $service)
    {
        
    }

    /**
     * handle payment transaction 
     *
     * @param [type] $user
     * @param [type] $paymentable
     * @param [type] $paymentable_type
     * @param [type] $request_input
     * @return $payment
     */
    public function handle($user, $paymentable, $paymentable_type, $request_input)
    {
        $transaction_no = mt_rand(123456,999999);

        if($paymentable_type == "subscription")
        {
            $payment = $paymentable->payments()->create([
                'user_id' => $user->id,
                'payment_method_id' => $request_input->payment_method_id,
                'user_name' => $user->full_name, 
                'paymentable_name' => $paymentable->subscription_type->type, 
                'transaction_no' => $transaction_no, 
                'reference_no' => $request_input->reference_no, 
                'amount' => 99.00
            ]);
    
        }
        else
        {
            $payment = $paymentable->payment()->create([
                'user_id' => $user->id,
                'payment_method_id' => $request_input->payment_method_id,
                'user_name' => $user->full_name, 
                'paymentable_name' => $paymentable->post->title ?? $paymentable->title, // BOOST POST / FLASHBARTEr / ADS
                'transaction_no' => $transaction_no, 
                'reference_no' => $request_input->reference_no, 
                'amount' => $request_input->amount
            ]);
    
        }
        
        // only upload receipt if its from registration and basic user

        if($paymentable_type == 'subscription' || $payment->user->current_subscription->subscription_type_id == \App\Models\SubscriptionType::BASIC)
        {
            $this->handleImageUpload(model: $payment, images: $request_input->image, collection:'payment_receipts', conversion_name:'card', action:'create'); // upload receipt
        }

       return $payment;
    }

    /**
     * handle the status of subscription and give the user an update
     *
     * @return void
     */
    public function handleSubscription($payment)
    {
        Mail::to(User::find($payment->user_id))->send(new PaymentSubscriptionUpdate(payment: $payment->load('user'))); // notify the user for the payment status
        
        if($payment->status == Payment::CONFIRMED) 
        {
            User::find($payment->user_id)->update(['is_activated' => true]); // activate user account
        }
        else
        {
             User::find($payment->user_id)->delete(); // Delete the record and the user must submit again a new registration 
        }

    }

    /**
     * handle the status of boostpost and give the user an update
     *
     * @return void
     */
    public function handleBoostedPost($payment)
    {
         Mail::to(User::find($payment->user_id))->send(new PaymentBoostedPostUpdate(payment: $payment->load('user', 'paymentable'))); // notify the user for the payment status

        //return $this->service->send(recipient: $payment->user, subject:'Boosted Post', status: $payment->status, route: route('user.boosted_posts.index')); // send sms
    }

    /**
     * handle the status of flash barter and give the user an update
     *
     * @return void
     */
    public function handleFlashBarter($payment)
    {
        Mail::to(User::find($payment->user_id))->send(new PaymentFlashBarterUpdate(payment: $payment->load('user', 'paymentable'))); // notify the user for the payment status

        //return $this->service->send(recipient: $payment->user, subject:'Flash Barter', status: $payment->status, route: route('user.flash_barters.index')); // send sms
    }


    /**
    * handle the status of boostpost and give the user an update
    *
    * @return void
    */
    public function handleAdvertisement($payment)
    {
        Mail::to(User::find($payment->user_id))->send(new PaymentAdsUpdate(payment: $payment->load('user', 'paymentable'))); // notify the user for the payment status

        //return $this->service->send(recipient: $payment->user, subject:'Advertisement', status: $payment->status, route: route('user.ads.index')); // send sms
    }

}