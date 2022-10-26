<?php

namespace App\Http\Requests\Barter;

use Illuminate\Foundation\Http\FormRequest;

class BarterRequest extends FormRequest
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
            'post_id' => ['required'],
            'bartered_post_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'post_id.required' => 'The target post is required',
            'bartered_post_id.required' => 'Please select an item to offer',
        ];
    }
}