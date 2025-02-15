<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'avatar' => $this->avatar_profile,
            'name' => $this->full_name,
            'subscription' => $this->current_subscription?->subscription_type?->type,
            'email_verified_at' => $this->email_verified_at,
            'is_activated' => $this->is_activated,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}