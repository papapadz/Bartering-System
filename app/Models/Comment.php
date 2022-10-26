<?php

namespace App\Models;

use App\Traits\BelongsToPost;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, BelongsToUser, BelongsToPost;

    protected $fillable = ['user_id', 'post_id', 'comment'];
}