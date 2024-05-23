<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;


class admincontroller extends Controller
{
    public function profile_detail($id){
        $data = User::where('id',$id)->first();
        return view('admin.account.profile',compact('data'));
    }

    // Edit Account
    public function profile_edit(){
        return view('admin.account.Edit');
    }

    // Update Account
    public function profile_update($id, Request $request){
        $this->updateaccount($request);
        $data = $this->updatedata($request);

        if ($request->hasfile('image')) {
            $oldimage = User::where('id',$id)->first()->image;
            if($oldimage != null){
                Storage::delete('public/profile_image/'.$oldimage);
            }
            $newimage = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/profile_image/',$newimage);
            $data['image'] = $newimage;
        }
        User::where('id',$id)->update($data);
        return redirect()->route('profile#detail',Auth::user()->id)->with(['success' => 'Profile Changed Success']);
    }

    // Update Password
    public function update_password(){
        return view('admin.account.update_password');
    }

    // Change Password
    public function password_update(Request $request){
        $this->updatepassword($request);
        $datas = User::select('password')->where('id',Auth::user()->id)->first();
        if(Hash::check($request->OldPassword,$datas->password)){
            User::where('id',Auth::user()->id)->update([
                'password' => Hash::make($request->NewPassword)
            ]);
            return back()->with(['success' => 'Password Changed Success']);
        }
        return back()->with(['failed' => 'Old Password are not Same !']);
    }

    // Manage Account List
    public function account_list(){
        $datas = User::select()->paginate(8);
        return view('admin.account.account_list',compact('datas'));
    }

    // Validation
    private function updatepassword($request){
        Validator::make($request->all(),[
            'OldPassword' => 'required|min:6',
            'NewPassword' => 'required|min:6',
            'ConfirmPassword' => 'required|same:NewPassword|min:6',
        ])->validate();
    }

    private function updateaccount($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'house_no' => 'required',
            'township' => 'required',
            'city' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp|file'
        ])->validate();
    }

    // Change Array
    private function updatedata($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'street' => $request->street,
            'house_no' => $request->house_no,
            'township' => $request->township,
            'city' => $request->city,
            'updated_at' => Carbon::now()
        ];
    }
}
