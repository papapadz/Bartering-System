<?php

namespace App\Models;

use App\Traits\BelongsToPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barter extends Model
{
    use HasFactory;

    public const PENDING = 0;
    public const ACCEPTED = 1;
    public const REJECTED = 2;

    protected $fillable = [
        'post_id', 
        'bartered_post_id', 
        'status'
    ];

    // ========================== Relationships ======================================================

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function bartered_post():BelongsTo
    {
        return $this->belongsTo(Post::class, 'bartered_post_id', 'id');
    }
}