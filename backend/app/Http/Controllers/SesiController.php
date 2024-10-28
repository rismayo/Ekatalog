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

        if (Auth::attempt($infologin)) {
            // Cek level pengguna setelah login
            if (Auth::user()->level == 'superadmin') {
                return redirect('/superadmin/dashboard');
            } elseif (Auth::user()->level == 'admin') {
                return redirect('/admin/dashboard');
            }
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            return redirect('/login')->withErrors('Email dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate(); 
        request()->session()->regenerateToken(); 

        return redirect('/login');
    }
}
