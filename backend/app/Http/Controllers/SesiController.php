<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function dashboard()
    {
        if (Auth::check()) {
            // Pengguna sudah login, arahkan ke dashboard yang sesuai
            if (Auth::user()->level == 'Superadmin') {
                return redirect()->route('superadmin.dashboard');
            } elseif (Auth::user()->level == 'Admin') {
                return redirect()->route('admin.dashboard');
            }
        }
        return view('login.login');
    }
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Cek kredensial login
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Redirect sesuai level pengguna
            if (Auth::user()->level == 'Superadmin') {
                return redirect()->route('superadmin.dashboard');
            } elseif (Auth::user()->level == 'Admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout(); // Logout jika level tidak dikenali
                return redirect('/login')->withErrors('Akses ditolak. Level tidak dikenali.');
            }
        } else {
            // Jika kredensial salah
            return redirect('/login')->withErrors('Email atau password yang dimasukkan tidak sesuai.')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        request()->session()->invalidate(); 
        request()->session()->regenerateToken(); 

        return redirect()->route('login');
    }
}
