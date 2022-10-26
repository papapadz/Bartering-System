<?php 

namespace App\Traits;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyComment {

     /**
     * the related model has many comment
     *
     * @return HasMany
     */
    
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

}