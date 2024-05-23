<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authcontroller extends Controller
{
    // login
    public function login_page(){
        return view('login');
    }

    // register
    public function register_page(){
        return view('register');
    }

    // auth
    public function auth(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('product#list');
        }
        return redirect()->route('user#home');
    }



}
