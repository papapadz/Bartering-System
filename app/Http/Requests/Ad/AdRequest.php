<?php

namespace App\Http\Requests\Ad;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
        return [
            'title' => ['required'],
            'content' => ['required'],
            'link' => ['required', 'url'],
            'day_count' => ['required'],
            'reference_no' => ['required'],
            'payment_method_id' => ['required'],
            'amount' => ['required'],
            'ads' => ['required'],
            'image' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'payment_method_id.required' => 'The payment method field is required',
            'ads.required' => 'Please upload at least one featured photo',
            'image.required' => 'Please upload a payment receipt',
        ];
    }
}