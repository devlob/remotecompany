<?php

namespace App\Http\Requests\PDFs;

use Illuminate\Foundation\Http\FormRequest;

class EditPdfRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'pdf' => 'required|mimes:pdf|max:10000'
        ];
    }
}
