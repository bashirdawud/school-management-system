<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function Userview(){
        // $allUser = User::all();
        $data['alldata'] = User::all();
        return view('backend.user.view_user',$data);
    }

    public function UserAdd(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
        
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',

        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->name = $request->name;
        $data->save();

        $notifications = array(
            "message" => "User Created Successfully",
            "alert-type" => "success"
        );

        return redirect()->route('user.view')->with($notifications);

    }

    public function UserEdit($id){
        $editData = User::findorFail($id);
        return view('backend.user.edit_user',compact('editData'));
    }

    public function UserUpdate(Request $request, $id){
        
        // $request->validate([
        //     'email' => 'required|unique:users|max:255',
        //     'name' => 'required',
        // ]);
        
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        
        $data->save();

    
        $notifications = array(
            "message" => "User Updated Successfully",
            "alert-type" => "info"
        );

        return redirect()->route('user.view')->with($notifications);
        
    }

    public function UserDelete($id){
        $user = User::findorFail($id);
        $user->delete();

        $notifications = array(
            "message" => "User deleted successfully",
            "alert-type" => "info"
        );

        return redirect()->route('user.view')->with($notifications);

    }




}
