<?php

namespace App\Http\Requests\Announcement;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
                'title' => ['required', 'unique:announcements,title'],
                'content' => ['required'],
            ],
            'PUT' => [
                'title' => ['required',  \Illuminate\Validation\Rule::unique('announcements')->ignore($this->announcement)],
                'content' => ['required'],
            ]
        };
    }

    public function messages()
    {
        return [
            'title.unique' => 'Announcement has already been exist'
        ];
    }
}