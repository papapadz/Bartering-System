<?php

namespace App\Models;

use App\Traits\HasManyPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasManyPost;

    protected $fillable = ['name'];

}