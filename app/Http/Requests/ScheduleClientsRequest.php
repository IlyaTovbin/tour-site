<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleClientsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'schedule' => 'required|numeric',
            'name' => 'required|min:2|max:255',
            'phone' => 'required|min:2|max:255',
            'email' => 'required|email',
            'quantity' => 'required|numeric',
            'transport' => 'required|numeric',
            'pay' => 'required|numeric',
            'price' => 'required|numeric',
            'city' => 'required|min:2|max:255',
        ];
    }
}
