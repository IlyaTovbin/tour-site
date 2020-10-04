<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FaqRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {   
        return [
            'question' => 'required|min:2',
            'answer' => 'required|min:2',
        ];
    }
}
