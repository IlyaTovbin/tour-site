<?php

namespace App\Http\Middleware;

use Closure, Session;
use Illuminate\Http\Request;

class LoginGuard
{
    public function handle(Request $request, Closure $next)
    {
        if( !Session::has('user_email') ){

            return redirect('/');

        }else{

            return $next($request);

        }

    }
}
