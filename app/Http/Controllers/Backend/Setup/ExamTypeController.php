<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ExamTypeView(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam',$data);
    }

    public function ExamTypeAdd(){
        return view('backend.setup.exam_type.add_exam');
    }

    public function ExamTypeStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);

        $data = new ExamType();
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Exam Type Added Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeEdit($id){
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam',compact('editData'));
    }

    public function ExamTypeUpdate(Request $request,$id){
        $data = ExamType::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);

        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Exam Type Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);

    }

    public function ExamTypeDelete($id){
        $user = ExamType::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Exam Type Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
}
