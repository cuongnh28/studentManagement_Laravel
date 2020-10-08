<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];
//        Auth::user()->name();
        if(Auth::attempt(['username'=>$username, 'password'=>$password]))
        {
            session(['id' => Auth::id()]);
            session(['username' => $username]);
//            return session('id');
            if(Auth::user()->level == 0)
            {
                session(['level' => 0]);
            }
            else
            {
                session(['level' => 1]);
            }
            return redirect('/home');
        }
        else
        {
//        echo "Loi";
        return view('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
