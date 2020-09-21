<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $view_data['title'] = 'Faq';
        $view_data['faq'] = 'active';
        return view('content/faq/faq_index', $view_data);
    }
}
