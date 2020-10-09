<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class TourRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        return [
            'title' => 'required|min:2',
            'location' => 'required|min:2',
            'summernote' => 'required|min:2',
            'file' => 'required|',
            'google_maps' => 'nullable',
        ];
    }
}
