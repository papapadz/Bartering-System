<?php 

namespace App\Traits;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait MorphManyFavorite {

    /**
     * the related model has morph many relationship 
     *
     * @return HasMany
     */
    public function favorites():MorphMany
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
}