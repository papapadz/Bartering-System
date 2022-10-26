<?php 

namespace App\Traits;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyPost {

    /**
     * the related model has many posts
     *
     * @return HasMany
     */
    public function posts():HasMany
    {
        return $this->HasMany(Post::class);
    }
}