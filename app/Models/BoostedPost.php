<?php

namespace App\Models;

use App\Traits\BelongsToPost;
use App\Traits\MorphOnePayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BoostedPost extends Model
{
    use HasFactory, 
    BelongsToPost, 
    MorphOnePayment;

    protected $fillable = [
        'post_id', 
        'date_start',
        'date_end',
        'day_count',
        'is_expired', 
    ];
}