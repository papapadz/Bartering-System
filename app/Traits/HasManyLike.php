<?php 

namespace App\Traits;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyLike {

     /**
     * the related model has many like
     *
     * @return HasMany
     */
    
    public function likes():HasMany
    {
        return $this->hasMany(Like::class);
    }

}