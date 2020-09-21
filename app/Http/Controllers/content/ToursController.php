<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index(){
        $view_data['title'] = 'Tours';
        $view_data['tours'] = 'active';
        return view('content/tours/tours_index', $view_data);
    }
}
