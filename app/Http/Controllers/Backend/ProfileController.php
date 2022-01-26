<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.profile.view_profile',compact('user'));
    }

    public function ProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.profile.edit_profile',compact('editData'));
    }

    public function ProfileStore(Request $request){
        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        
        if ($request->file('picture')) {
            $file = $request->file('picture');
            @unlink(public_path('upload/profile_pictures/'.$data->picture));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/profile_pictures'),$filename);
            $data['picture'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Picture Updated Succesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.view')->with($notification);
    }

    public function PasswordEdit(){
        return view('backend.profile.update_password');
    }

    public function PasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
         
            $notification = array(
                'message' => 'Password Updated Succesfully!',
                'alert-type' => 'success'
            );

        }else{
            return redirect()->back();
        }
    }
}
