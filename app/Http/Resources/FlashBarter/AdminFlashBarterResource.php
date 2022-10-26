<?php

namespace App\Http\Resources\FlashBarter;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminFlashBarterResource extends JsonResource
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
            'user' => $this->user->full_name,
            'post' => $this->paymentable_name,
            'transaction_no' => $this->transaction_no,
            'amount' => $this->amount,
            'reference_no' => $this->reference_no,
            'is_expired' => $this->paymentable->is_expired,
            'status' => $this->status,
            'remark' => $this->remark,
            'due' => $this->paymentable->date_end,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}