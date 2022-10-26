<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Announcement extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug', 
        'content'
    ];

    // ========================== Accessor & Mutator ======================================================
    
    public function getFeaturedPhotoAttribute()
    {
        return optional($this->getFirstMedia('announcement_images'))->getUrl('card');
    }

    // ========================== Custom Methods ======================================================
    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('card')
        ->width(600)
        ->nonQueued();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}