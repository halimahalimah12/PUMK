<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login' );
    }
    public function authenticate(Request $request){
        $credentials     =   $request->validate([
            'email'     =>  'required|email:dns',
            'password'  =>  'required'
        ]);

        if(Auth::attempt($credentials)){
        $request->session()->flash('success','Selamat Datang di Sistem Informasi PUMK.');
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
        }

        return back()->with('loginerror','Login field!');

    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');

    }

}
