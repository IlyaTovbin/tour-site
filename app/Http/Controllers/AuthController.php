<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Auth;

class AuthController extends Controller
{
    public static function index(){
        $view_data['title'] = 'Login';
        return view('login', $view_data);
    }

    public static function postLogin(LoginRequest $request){
        if(Auth::validate($request['email'], $request['password'])){
            return redirect('dashboard');
        }else{
            $view_data['title'] = 'Login';
            $view_data['login_error'] = 'Wrong Email or password';
            return view('login', $view_data);
        }
    }
}
