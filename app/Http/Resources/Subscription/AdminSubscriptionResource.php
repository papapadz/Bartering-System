<?php

namespace App\Http\Resources\Subscription;

use App\Models\Subscription;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminSubscriptionResource extends JsonResource
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
            'user' => $this->user->full_name ?? $this->user_name,
            'paymentable_name' => $this->paymentable_name,
            'paymentable_type' => $this->paymentable_type,
            'transaction_no' => $this->transaction_no,
            'amount' => $this->amount,
            'reference_no' => $this->reference_no,
            'is_expired' => $this->is_expired,
            'status' => $this->status,
            'remark' => $this->remark,
            'due' => $this->paymentable->due,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}