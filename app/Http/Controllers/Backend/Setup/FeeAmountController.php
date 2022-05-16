<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeAmount;
use App\Models\StudentFee;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
    public function StudentFeeAmntView(){
        $data{'allData'} = FeeAmount::select('fee_category_id')->
        groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_feeamnt',$data);
    }

    public function StudentFeeAmntAdd(){
    	$data['fee_categories'] = StudentFee::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.setup.fee_amount.add_feeamnt',$data);
    }


    public function StudentFeeAmntStore(Request $request){

    	$countClass = count($request->class_id);
    	if ($countClass !=NULL) {
    		for ($i=0; $i <$countClass ; $i++) { 
    			$fee_amount = new FeeAmount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();

    		}
    	}

    	$notification = array(
    		'message' => 'Fee Amount Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.feeamnt.view')->with($notification);

    }  

    public function StudentFeeAmntEdit($fee_category_id){
    	$data['editData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
    	// dd($data['editData']->toArray());
    	$data['fee_categories'] = StudentFee::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.setup.fee_amount.edit_feeamnt',$data);

    }


    public function StudentFeeAmntUpdate(Request $request,$fee_category_id){
    	if ($request->class_id == NULL) {
       
        $notification = array(
    		'message' => 'Error, Please type in an amount',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('student.feeamnt.edit',$fee_category_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->class_id);
	FeeAmount::where('fee_category_id',$fee_category_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$fee_amount = new FeeAmount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();

    		}	 

    	}

       $notification = array(
    		'message' => 'Information Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.feeamnt.view')->with($notification);
    }



 	public function StudentFeeAmntDetails($fee_category_id){
   $data['detailsData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();

   return view('backend.setup.fee_amount.details_feeamnt',$data);


 	}
}
