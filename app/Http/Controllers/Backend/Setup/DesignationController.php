<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function DesignationView(){
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }

    public function DesignationAdd(){
        return view('backend.setup.designation.add_designation');
    }

    public function DesignationStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Designation Added Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('school.designation.view')->with($notification);
    }

    public function DesignationEdit($id){
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('editData'));
    }

    public function DesignationUpdate(Request $request,$id){
        $data = Designation::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Designation Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('school.designation.view')->with($notification);

    }

    public function DesignationDelete($id){
        $user = Designation::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Designation Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('school.designation.view')->with($notification);
    }
}
