<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use DB;
use PDF;

class EmployeeRegController extends Controller
{
    
    public function EmployeeView(){

    	$data['allData'] = User::where('roll','Employee')->get();
    	return view('backend.employee.employee_reg.employee_view',$data);
    }


    public function EmployeeAdd(){
    	$data['designation'] = Designation::all();
    	return view('backend.employee.employee_reg.employee_add',$data);
    }

    public function EmployeeStore(Request $request){
    	DB::transaction(function() use($request){
    	$checkYear = date('Ym',strtotime($request->join_date));
    	$employee = User::where('roll','employee')->orderBy('id','DESC')->first();

    	if ($employee == null) {
    		$firstReg = 0;
    		$employeeId = $firstReg+1;
    		if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}
    	}else{
     $employee = User::where('roll','employee')->orderBy('id','DESC')->first()->id;
     	$employeeId = $employee+1;
     	if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}

    	} 

    	$final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->roll = 'employee';
    	$user->code = $code;
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->salary = $request->salary;
    	$user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	$user->join_date = date('Y-m-d',strtotime($request->join_date));

    	if ($request->file('picture')) {
    		$file = $request->file('picture');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/employee_pictures'),$filename);
    		$user['picture'] = $filename;
    	}
 	    $user->save();

          $employee_salary = new EmployeeSalaryLog();
          $employee_salary->employee_id = $user->id;
          $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
          $employee_salary->previous_salary = $request->salary;
          $employee_salary->present_salary = $request->salary;
          $employee_salary->increment_salary = '0';
          $employee_salary->save();

           
    	});


    	$notification = array(
    		'message' => 'Employee Registered Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.registration.view')->with($notification);

    } 




    public function EmployeeEdit($id){
    	$data['editData'] = User::find($id);
    	$data['designation'] = Designation::all();
    	return view('backend.employee.employee_reg.employee_edit',$data);

    }


    public function EmployeeUpdate(Request $request, $id){
    
    	$user = User::find($id);
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	 
    	$user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	 

    	if ($request->file('picture')) {
    		$file = $request->file('picture');
    		@unlink(public_path('upload/employee_pictures/'.$user->picture));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/employee_pictures'),$filename);
    		$user['picture'] = $filename;
    	}
 	    $user->save();

         

    	$notification = array(
    		'message' => 'Employee Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.registration.view')->with($notification);


    }



    public function EmployeeDetails($id){
    	$data['details'] = User::find($id);

    $pdf = PDF::loadView('backend.employee.employee_reg.employee_details_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }

	public function EmployeeDelete($id){
        $employee = User::find($id);
        $employee->delete();

        $notification = array(
            'message' => 'Employee Deleted Succesfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('employee.registration.view')->with($notification);
    }


}
 