<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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


    public function rules()
    {
        return match(request()->subscription_type) {
            'basic' => [
                'terms_of_service' => ['required'],
                'subscription_type' => ['required'],
                'first_name' => ['required'],
                'middle_name' => ['required'],
                'last_name' => ['required'],
                'gender' => ['required'],
                'birth_date' => ['required'],
                'address' => ['required'],
                'municipality_id' => ['required'],
                'contact' => ['required', 'digits:11'],
                'email' => ['required','email', 'unique:users'],
                'password' => ['required', 'confirmed', 'min:8', 'max:12'],
            ],
            'pro' => [
                'terms_of_service' => ['required'],
                'subscription_type' => ['required'],
                'first_name' => ['required'],
                'middle_name' => ['required'],
                'last_name' => ['required'],
                'gender' => ['required'],
                'birth_date' => ['required'],
                'address' => ['required'],
                'municipality_id' => ['required'],
                'contact' => ['required', 'digits:11'],
                'email' => ['required','email', 'unique:users'],
                'password' => ['required', 'confirmed', 'min:8', 'max:12'],
                'image' => ['required_if:subscription_type,pro'],
                'reference_no' => ['required'],
                'payment_method_id' => ['required'],
            ]
        };
    }

    public function messages()
    {
        return [
            'municipality_id.required' => 'The municipality field is required.',
            'image.required_if' => 'The payment receipt screenshot is required if you want to subscribe to our pro account',
            'terms_of_service.required' => 'Please read our terms of service.',
            'payment_method_id.required' => 'The payment method field is required',
        ];
    }
}