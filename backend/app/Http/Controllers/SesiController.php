<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function dashboard()
    {
        return view('login.login');
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'email wajib diisi',
            'password.required'=>'password wajib diisi'
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('/superadmin/dashboard');
        }else{
            return redirect('/login')->withErrors('email dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
