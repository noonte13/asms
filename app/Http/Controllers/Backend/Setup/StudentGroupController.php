<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function StudentGroupView(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group',$data);
    }

    public function StudentGroupAdd(){
        return view('backend.setup.student_group.add_group');
    }

    public function StudentGroupStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Section Added Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group',compact('editData'));
    }

    public function StudentGroupUpdate(Request $request,$id){
        $data = StudentGroup::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Section Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);

    }

    public function StudentGroupDelete($id){
        $user = StudentGroup::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Section Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
}
