<?php 

namespace App\Traits;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait MorphOnePayment {

    /**
     * the related model has morph one relationship 
     *
     * @return MorphOne
     */
    public function payment():MorphOne
    {
        return $this->morphOne(Payment::class, 'paymentable');
    }
}