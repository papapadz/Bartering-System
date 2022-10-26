<?php 

namespace App\Traits;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait MorphManyPayment {

    /**
     * the related model has morph many relationship 
     *
     * @return MorphMany
     */
    public function payments():MorphMany
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}