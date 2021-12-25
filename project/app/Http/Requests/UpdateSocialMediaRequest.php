<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialMediaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ar' => ['required', 'string'],
            'name_en' => ['required', 'string'],
            'link' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => 'Please add a name arabic',
            'name_en.required' => 'Please add a name english',
            'link.required' => 'Please add a link',
        ];
    }
}
