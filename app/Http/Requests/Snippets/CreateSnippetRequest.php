<?php

namespace App\Http\Requests\Snippets;

use Illuminate\Foundation\Http\FormRequest;

class CreateSnippetRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required',
            'html' => 'required',
        ];
    }
}
