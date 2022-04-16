<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //halaman login
    public function index(){
        return view('user.login');
    }

    //autentikasi
    public function login(){
        $credentials = request()->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        $remember = request()->has('remember') ? true : false;
        if (Auth::attempt($credentials, $remember)){
            request()->session()->regenerate();
            return redirect()->intended(route(auth()->user()->jabatan));
        } else {
            return back()->with('login_error','NIM atau Password Salah');
        }
    }

    //logout
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
