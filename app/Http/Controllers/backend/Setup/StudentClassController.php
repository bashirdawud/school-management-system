<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    
    public function ViewStudent(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function AddStudent(){
        return view('backend.setup.student_class.add_class');
    }

    public function StoreClass(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notifications = array(
            "message" => "Class Successfully Added",
            "alert-type" => "info"
        );

        return redirect()->route('student.class.view')->with($notifications);

    }

    public function EditClass($id){
        $class = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('class'));
    }

    public function UpdateClass(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $data = StudentClass::find($id);
        $data->name = $request->name;
        $data->save();

        $notifications = array(
            "message" => "Class Successfully updated",
            "alert-type" => "success"
        );

        return redirect()->route('student.class.view')->with($notifications);
    }

    public function DeleteClass($id){
        $class = StudentClass::findOrFail($id);
        $class->delete();

        $notifications = array(
            "message" => "Class Successfully Deleted",
            "alert-type" => "success"
        );

        return redirect()->route('student.class.view')->with($notifications);

    }



}
