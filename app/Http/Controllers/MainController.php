<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class MainController extends Controller
{
    public static function index(){
        $view_data['title'] = 'Admin Panel';
        $view_data['dashboard'] = 'active';
        return view('content/main_panel', $view_data);
    }
    public static function logout(){
        Session::forget('user_email');
        return redirect('/');
    }
}
