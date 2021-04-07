<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    
    public function ViewYear(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }

    public function AddYear(){
        return view('backend.setup.year.add_year');
    }

    public function StoreYear(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notifications = array(
            "message" => "Class Year Successfully Added",
            "alert-type" => "success"
        );

        return redirect()->route('student.year.view')->with($notifications);
    }

    public function EditYear($id){
        $editYear = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editYear'));
    }

    public function UpdateYear(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $year = StudentYear::find($id);
        $year->name = $request->name;
        $year->update();

        $notifications = array(
            "message" => "Class Year Successfully Updated",
            "alert-type" => "success"
        );

        return redirect()->route('student.year.view')->with($notifications);


    }


    public function DeleteYear($id){
        $deleteyear = StudentYear::find($id);
        $deleteyear->delete();

        $notifications = array(
            "message" => "Student Year Successfully Deleted",
            "alert-type" => "success"
        );

        return redirect()->route('student.year.view')->with($notifications);
    }



}
