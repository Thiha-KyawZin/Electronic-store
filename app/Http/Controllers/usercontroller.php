<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function user_home(){
        return view('user.product.detail');
    }
}
