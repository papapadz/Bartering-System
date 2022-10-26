<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        return match ($this->method()) {
            'POST' => [
                'first_name' => ['required'],
                'middle_name' => ['required'],
                'last_name' => ['required'],
                'gender' => ['required'],
                'birth_date' => ['required'],
                'address' => ['required'],
                'municipality_id' => ['required'],
                'contact' => ['required', 'digits:11'],
                'email' => ['required','email', 'unique:users'],
            ],
            'PUT' => [
                'first_name' => ['sometimes'],
                'middle_name' => ['sometimes'],
                'last_name' => ['sometimes'],
                'gender' => ['sometimes'],
                'birth_date' => ['sometimes'],
                'address' => ['sometimes'],
                'municipality_id' => ['sometimes'],
                'contact' => ['sometimes', 'digits:11'],
                'email' => ['sometimes','email', \Illuminate\Validation\Rule::unique('users', 'email')->ignore($this->admin)],
            ]
        };
    }

    public function messages()
    {
        return [
            'municipality_id' => 'The municipality field is required.',
            'email.unique' => 'The email has already been taken.'
        ];
    }
}