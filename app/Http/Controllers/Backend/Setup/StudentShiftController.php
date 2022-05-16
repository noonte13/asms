<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function StudentShiftView(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.student_shift.view_shift',$data);
    }

    public function StudentShiftAdd(){
        return view('backend.setup.student_shift.add_shift');
    }

    public function StudentShiftStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Shift Added Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftEdit($id){
        $editData = StudentShift::find($id);
        return view('backend.setup.student_shift.edit_shift',compact('editData'));
    }

    public function StudentShiftUpdate(Request $request,$id){
        $data = StudentShift::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Shift Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);

    }

    public function StudentShiftDelete($id){
        $user = StudentShift::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Shift Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
}
