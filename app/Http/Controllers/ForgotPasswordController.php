<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // Forgot_password
    public function forgot_password(){
        return view('forgot_password');
    }

    // Password_forgot
    public function password_forgot(Request $request){
        $request->validate([
            'email' => 'required|email|'
        ]);
        $email = User::where('email','=',$request->email)->exists();
        if($email == 'true'){
            $token = Str::random(64);
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::send('reset_password',['token' => $token],
                function($message) use($request){
                    $message->to($request->email);
                    $message->subject('Reset Password');
            });
            return back()->with(['message' => 'Email Send Successful']);
        }
        return back()->with(['FailMessage' => "Email Doesn't have..!"]);
    }

    public function showResetPasswordForm($token) {
        return view('reset_password_form', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required|min:6',
        ]);
        $email = DB::table('password_reset_tokens')->where('token',$request->token)->first()->email;
        if($request->token === DB::table('password_reset_tokens')->where('token',$request->token)->first()->token && $email === User::where('email',$email)->first()->email){
            User::where('email',$email)->update([
                'password' => Hash::make($request->password)
            ]);
            DB::table('password_reset_tokens')->where('token',$request->token)->delete();
            return redirect('/');

        }

    }
}
