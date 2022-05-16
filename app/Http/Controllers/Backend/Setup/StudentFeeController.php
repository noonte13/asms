<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFee;

class StudentFeeController extends Controller
{
    public function StudentFeeCatView(){
        $data['allData'] = StudentFee::all();
        return view('backend.setup.student_fee.view_fee',$data);
    }

    public function StudentFeeCatAdd(){
        return view('backend.setup.student_fee.add_fee');
    }

    public function StudentFeeCatStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_fees,name',
        ]);

        $data = new StudentFee();
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Fee Category Added Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.fee.view')->with($notification);
    }

    public function StudentFeeCatEdit($id){
        $editData = StudentFee::find($id);
        return view('backend.setup.student_fee.edit_fee',compact('editData'));
    }

    public function StudentFeeCatUpdate(Request $request,$id){
        $data = StudentFee::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_fees,name',
        ]);

        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Fee Category Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.fee.view')->with($notification);

    }

    public function StudentFeeCatDelete($id){
        $user = StudentFee::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Fee Category Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('student.fee.view')->with($notification);
    }
}
