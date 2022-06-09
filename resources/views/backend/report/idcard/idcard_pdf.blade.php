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
    <td><h2>ASMS REPORTS</h2>
<p>Galolhu, Male', Maldives</p>
<p>Phone : 332 XXXX</p>
<p>Email : support@asms.com</p>
<p> <b>Student ID Details of Class </b> </p>

    </td> 
  </tr>
  
   
</table>
 
 @foreach($allData as $value)
<table id="customers">
   
 <tr>
   <td>ASMS</td>
   <td> === </td>
   <td> === </td>

 </tr>  

 <tr>
   <td>Name : {{ $value['student']['name'] }}</td>
   <td>Session : {{ $value['student_year']['name'] }}</td>
   <td> Class : {{ $value['student_class']['name'] }}</td>

 </tr> 


 <tr>
   <td>Roll : {{ $value->roll }} </td>
   <td>ID No : {{ $value['student']['id_no'] }}</td>
   <td> Mobile:{{ $value['student']['mobile'] }} </td>

 </tr> 


   
</table>
@endforeach

<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

 
 

</body>
</html>
