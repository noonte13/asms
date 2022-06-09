<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
        $data['allData'] = User::where('roll', '!=', 'Student')->where('roll', '!=', 'employee')->get();
        return view('backend.user.view_user', $data);

    }

    public function UserAdd(){
        $data['allData'] = User::all();
        return view('backend.user.add_user', $data);

    }

    public function UserStore(Request $request){
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $code = rand(000,999);
        $data->roll = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;

        $data->save();
        $notification = array(
            'message' => 'User Added Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id){
        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));
    }

    public function UserUpdate(Request $request, $id){
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;

        $data->save();
        $notification = array(
            'message' => 'User Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id){
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    }
}
