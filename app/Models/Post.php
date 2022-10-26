<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\HasManyComment;
use App\Traits\HasManyLike;
use App\Traits\MorphManyFavorite;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use phpDocumentor\Reflection\Types\Self_;

class Post extends Model implements HasMedia
{
    use HasFactory,
    HasManyLike,
    HasManyComment, 
    BelongsToUser,
    MorphManyFavorite, 
    InteractsWithMedia;

    public const PENDING = 0;
    public const APPROVED = 1;
    public const REJECTED = 2;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'condition',
        'value',
        'shipping_options',
        'tags',
        'status',
        'remark',
        'is_bartered'
    ];

    // ==============================Relationship==================================================

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function boosted_posts():HasMany
    {
        return $this->hasMany(BoostedPost::class);
    }

    public function active_boosted_posts():HasMany
    {
        return $this->hasMany(BoostedPost::class)->where('is_expired', false);
    }

    public function flash_barters():HasMany
    {
        return $this->hasMany(FlashBarter::class);
    }

    public function active_flash_barters():HasMany
    {
        return $this->hasMany(FlashBarter::class)->where('is_expired', false);
    }

 
    public function barters():HasMany
    {
        return $this->hasMany(Barter::class);
    }

    // ============================== Accessor & Mutator ==========================================

    public function getFeaturedPhotoAttribute()
    {
        return optional($this->getFirstMedia('post_images'))->getUrl('card');
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