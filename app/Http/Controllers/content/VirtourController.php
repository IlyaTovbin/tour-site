<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VirtourController extends Controller
{
    public function index(){
        $view_data['title'] = 'Vir-Tours';
        $view_data['vir_tours'] = 'active';
        return view('content/virtour/virtour_index', $view_data);
    }
}
