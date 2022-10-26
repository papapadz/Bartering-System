<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'category_id' => ['required'],
                'title' => ['required',  \Illuminate\Validation\Rule::unique('posts', 'title')->where('user_id', auth()->id())],
                'description' => ['required'],
                'condition' => ['required'],
                'value' => ['required'],
                'tags' => ['required'],
                'shipping_options' => ['required'],
                'image' => ['required']
            ],
            'PUT' => [
                'category_id' => ['sometimes'],
                'title' => ['sometimes',  \Illuminate\Validation\Rule::unique('posts', 'title')->where('user_id', auth()->id())->ignore($this->post)],
                'description' => ['required'],
                'condition' => ['sometimes'],
                'value' => ['required'],
                'tags' => ['required'],
                'shipping_options' => ['required'],
            ]
        };
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required',
            'title.unique' => 'Title has already been exist',
            'shipping_options.required' => 'The shipping options field is required.',
            'image.required' => 'Please upload at least one photo of your item',
        ];
    }
}