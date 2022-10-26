<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = ['user_id', 'favoritable_id', 'favoritable_type', 'favoritable_name'];

    public function favoritable()
    {
        return $this->morphTo();
    }
}