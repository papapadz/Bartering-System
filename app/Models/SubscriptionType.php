<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionType extends Model
{
    use HasFactory;

    public const BASIC = 1;
    public const PRO = 2;

    protected $fillable = [
        'type', 
        'fee', 
        'post_count', 
        'boost_post', 
        'flash_barter'
    ];

    // ==============================Relationship==================================================

    public function subscriptions():HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}