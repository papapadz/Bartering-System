<?php

namespace App\Models;

use App\Traits\BelongsToPost;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory, BelongsToUser, BelongsToPost;

    protected $fillable = ['user_id', 'post_id'];

}