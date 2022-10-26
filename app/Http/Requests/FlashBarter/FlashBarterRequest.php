<?php

namespace App\Http\Requests\FlashBarter;

use Illuminate\Foundation\Http\FormRequest;

class FlashBarterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return match (auth()->user()->current_subscription->subscription_type_id) 
        {
            \App\Models\SubscriptionType::BASIC => [
                'post_id' => ['required'],
                'reference_no' => ['required'],
                'payment_method_id' => ['required'],
                'amount' => ['required'],
                'image' => ['required'],
            ],
            \App\Models\SubscriptionType::PRO => [
                'post_id' => ['required'],
            ]
        };
    }

    public function messages()
    {
        return [
            'post_id.required' => 'The post field is required',
            'payment_method_id.required' => 'The payment method field is required',
            'image.required' => 'Please upload a payment receipt',
        ];
    }
}