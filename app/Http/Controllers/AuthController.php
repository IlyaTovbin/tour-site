<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public static function index(){
        $view_data['title'] = 'Login';
        return view('login', $view_data);
    }
}
