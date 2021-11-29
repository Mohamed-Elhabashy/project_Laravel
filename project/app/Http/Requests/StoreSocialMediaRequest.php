<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialMediaRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name.ar'=> ['required','string'],
            'name.en'=> ['required','string'],
            'link' => ['required','string'],
        ];
    }
    public function messages()
    {
        return [
            'name.ar.required' => 'Please add a name arabic',
            'name.en.required' => 'Please add a name english',
            'link.required' => 'Please add a link',
        ];
    }
}
