<?php

namespace App\Models;

use App\Traits\HasManyComment;
use App\Traits\HasManyLike;
use App\Traits\HasManyPost;
use App\Traits\MorphManyFavorite;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use HasFactory,
    HasManyPost,
    HasManyLike,
    HasManyComment,
    MorphManyFavorite, 
    Notifiable, 
    InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birth_date',
        'address',
        'municipality_id',
        'contact',
        'email',
        'password',
        'email_verified_at',
        'verification_token',
        'is_activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // ==============================Relationship==================================================

    public function avatar():HasOne
    {
        return $this->hasOne(Media::class, 'model_id', 'id');
    }

    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function municipality():BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    public function subscriptions():HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function ratings():HasMany
    {
        return $this->hasMany(Rating::class, 'receiver_id', 'id');
    }

    public function ads():HasMany
    {
        return $this->hasMany(Ad::class);
    }


    // ============================== Accessor & Mutator ==========================================

    public function getAvatarProfileAttribute()
    {
        return optional($this->getFirstMedia('avatar_image'))->getUrl('avatar');
    }
    
    public function getAvatarThumbnailAttribute()
    {
        return optional($this->getFirstMedia('avatar_image'))->getUrl('thumbnail');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAvgRatingsAttribute()
    {
        return $this->ratings->avg('rating');
    }

    /**
     * get the current active subscription
     *
     */
    public function getCurrentSubscriptionAttribute()
    {
        return $this->subscriptions()->where('is_expired', false)->latest()->first();
    }


    // ========================== Custom Methods ======================================================

    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('avatar')
        ->width(300)
        ->nonQueued();

        $this->addMediaConversion('thumbnail')
        ->width(120)
        ->nonQueued();
    }

    public function hasRole($role) {
        return $this->role()->where('name', $role)->first() ? true : false;
    }

    // ========================== Local Scope ======================================================

    public function scopeActive($query)
    {
        return $query->where('is_activated', true);
    }
    
    public function scopeByRole($query, $role)
    {
        return $query->whereRelation('role', 'name', $role);
    }

}