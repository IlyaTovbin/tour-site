<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class BlogRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        return [
            'title' => 'required|min:2',
            'category' => 'required',
            'summernote' => 'required|min:2',
            'image' => 'required',
        ];
    }
}
