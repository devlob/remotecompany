<?php

namespace App\Http\Requests\Links;

use Illuminate\Foundation\Http\FormRequest;

class CreateLinkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'link' => 'required|url',
            'open_in_new_tab' => 'boolean'
        ];
    }
}
