<?php

namespace App\Http\Resources\Barter;

use Illuminate\Http\Resources\Json\JsonResource;

class BarterResource extends JsonResource
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
            'featured_photo' => $this->post->user_id == auth()->id() ? $this->post->featured_photo  : $this->bartered_post->featured_photo,
            'post' => $this->post->user_id == auth()->id() ? $this->post->title  : $this->bartered_post->title,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}