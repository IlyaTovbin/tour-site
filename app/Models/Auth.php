<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, Hash, Session;

class Auth extends Model
{
    static public function validate( $email, $password ){

        $valid = false;
        $user = DB::table('users')
        ->where('email', '=', $email)
        ->first();

        if( $user ){

            if( Hash::check($password, $user->password) ){

                Session::put('user_email', $email);
                $valid = true;
                
            }

        }

        return $valid;
    }
}
