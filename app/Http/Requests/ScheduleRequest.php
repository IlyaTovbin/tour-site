<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ScheduleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        return [
            'title' => 'required|min:2',
            'summernote' => 'required|min:2',
            'notes' => 'nullable',
            'file' => 'nullable',
            'google_maps' => 'nullable',
            'price' => 'required|numeric',
            'from_date' => 'required',
            'to_date' => 'nullable',
        ];
    }
}
