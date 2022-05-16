<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function StudentYearView(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.student_year.view_year',$data);
    }

    public function StudentYearAdd(){
        return view('backend.setup.student_year.add_year');
    }

    public function StudentYearStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Year Added Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearEdit($id){
        $editData = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year',compact('editData'));
    }

    public function StudentYearUpdate(Request $request,$id){
        $data = StudentYear::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Year Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);

    }

    public function StudentYearDelete($id){
        $user = StudentYear::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Year Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    
}
