<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function ViewProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.view_profile', compact('user'));
    }


    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.user.edit_profile', compact('editData'));
    }

    public function UpdateProfile(Request $request){
        
        $data = User::find(Auth::user()->id);
        var_dump($data);
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->image = $request->image;

        if($request->file('image')){
            // local Storage
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            // save to db
            $data['image'] = $filename;

        }

        $data->save();

        $notification = array(
            "message" => "User Profile Successfully Updated",
            "alert_type" => "success"
        );

        return redirect()->route('profile.view')->with($notification);


    }

    public function PasswordView() {
        $user = User::find(Auth::user()->id);
        return view('backend.user.edit_password', compact('user'));
        
    }

    public function PasswordUpdate(Request $request){
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ],
        [
            'password.confirmed' => 'Password does not match'
        ]
        );

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else {
            return redirect()->back();
        }
    }


}
