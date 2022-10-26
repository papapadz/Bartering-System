<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model implements HasMedia
{
    use HasFactory, BelongsToUser, InteractsWithMedia;

    public const PENDING = 0;
    public const CONFIRMED = 1;
    public const REJECTED = 2;

    protected $fillable = [
        'user_id', 
        'payment_method_id',
        'user_name',
        'paymentable_id', 
        'paymentable_type', 
        'paymentable_name',
        'transaction_no',
        'amount', 
        'reference_no',
        'status',
        'remark'
    ];

    // ============================== Morph ==========================================

    /**
     * Get the parent paymetable model (user or post).
     */
    
    public function paymentable()
    {
        return $this->morphTo();
    }

    // ============================== Relationship ==========================================

    public function payment_method():BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    
    // ============================== Accessor & Mutator ==========================================

    public function getPaymentReceiptAttribute()
    {
        return optional($this->getFirstMedia('payment_receipts'))->getUrl('card');
    }

    // ========================== Custom Methods ======================================================

    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('card')
        ->width(600)
        ->nonQueued();
    }
}