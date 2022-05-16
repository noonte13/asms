<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function StudentClassView(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }

    public function StudentClassAdd(){
        return view('backend.setup.student_class.add_class');
    }

    public function StudentClassStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentCLass();
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Class Added Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassEdit($id){
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('editData'));
    }

    public function StudentClassUpdate(Request $request,$id){
        $data = StudentCLass::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Class Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);

    }

    public function StudentClassDelete($id){
        $user = StudentClass::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Class Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
}
