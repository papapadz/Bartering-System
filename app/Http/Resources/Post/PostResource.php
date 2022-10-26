<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'featured_photo' => $this->featured_photo,
            'owner' => $this->user->full_name,
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category->name,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateString()
        ];
    }
}