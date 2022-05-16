<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #560e75;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
    <td><h2>
  <?php $image_path = '/upload/logo.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="100" height="100">

    </h2></td>


    <td><h2>ASMS FEE INFORMATION</h2>
<p>Galolhu, Male', Maldives</p>
<p>Phone : 332 XXXX</p>
<p>Email : support@asms.com</p>
<p> <b> Student Monthly Fee</b> </p>
    </td> 
  </tr>
  
   
</table>

@php 
$registrationfee = App\Models\FeeAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();
$originalfee = $registrationfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;

@endphp 

<table id="customers">
  <tr>
    <th width="10%">#</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{ $details->roll }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Date of Birth</b></td>
    <td>{{ $details['student']['dob'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session Year</b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Class </b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Semester Fee</b></td>
    <td>{{ $originalfee }} MVR</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Percentage </b></td>
    <td>{{ $discount  }} %</td>
  </tr>

    <tr>
    <td>9</td>
    <td><b>Final Fee of Semester {{ $sem }} </b></td>
    <td>{{ $finalfee }} MVR</td>
  </tr>
 
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

<table id="customers">
  <tr>
    <th width="10%">#</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Roll No</b></td>
    <td>{{ $details->roll }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Date of Birth</b></td>
    <td>{{ $details['student']['dob'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session Year</b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Class </b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Semester Fee</b></td>
    <td>{{ $originalfee }} MVR</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Percentage </b></td>
    <td>{{ $discount  }} %</td>
  </tr>

    <tr>
    <td>9</td>
   <td><b>Final Fee of Semester {{ $sem }} </b></td>
    <td>{{ $finalfee }} MVR</td>
  </tr>
 
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>


</body>
</html>
