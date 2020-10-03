<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BlogRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {   
        $required = isset($request['check']) ? 'nullable' : 'required';
        return [
            'title' => 'required|min:2',
            'category' => 'required',
            'summernote' => 'required|min:2',
            'image' => $required,
        ];
    }
}
