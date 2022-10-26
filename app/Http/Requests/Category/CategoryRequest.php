<?php

namespace App\Http\Requests\Category;

use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        return Arr::get([
            'POST' => [
                'name' => ['required', 'unique:categories'],
            ],
            'PUT' => [
                'name' => ['required', Rule::unique('categories')->ignore($this->category)],
            ]
        ], $this->method(), []);
    }

    public function messages()
    {
        return [
            'name.unique' => 'Category has already been exist'
        ];
    }
}
