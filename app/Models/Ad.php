<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\MorphOnePayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ad extends Model implements HasMedia
{
    use HasFactory, 
    BelongsToUser, 
    MorphOnePayment, 
    InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'link',
        'date_start',
        'date_end',
        'day_count',
        'is_expired', 
    ];

    // ============================== Accessor & Mutator ==========================================

    public function getFeaturedPhotoAttribute()
    {
        return optional($this->getFirstMedia('ad_images'))->getUrl('card');
    }

    // ========================== Custom Methods ======================================================

    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('card')
        ->width(450)
        ->keepOriginalImageFormat()
        ->nonQueued();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}