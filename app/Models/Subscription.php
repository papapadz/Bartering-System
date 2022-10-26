<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\MorphManyPayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Subscription extends Model
{
    use HasFactory, BelongsToUser, MorphManyPayment;

    protected $fillable = [
        'user_id', 
        'subscription_type_id', 
        'due',
        'is_expired',
    ];

    // ==============================Relationship==================================================

    public function subscription_type():BelongsTo
    {
        return $this->belongsTo(SubscriptionType::class);
    }
}