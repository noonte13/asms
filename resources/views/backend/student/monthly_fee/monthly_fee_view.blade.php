@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">

		
<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Semester Fee</strong></h4>
				  </div>

				  <div class="box-body">
				
	 
			<div class="row">



<div class="col-md-3">

 		 <div class="form-group">
		<h5>Year <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="year_id" id="year_id" required="" class="form-control">
			<option value="" selected="" disabled="">Select Year</option>
			 @foreach($years as $year)
 <option value="{{ $year->id }}" >{{ $year->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 



 			
 		<div class="col-md-3">

 		 <div class="form-group">
		<h5>Class <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="class_id" id="class_id"  required="" class="form-control">
			<option value="" selected="" disabled="">Select Class</option>
			 @foreach($classes as $class)
			<option value="{{ $class->id }}">{{ $class->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 


<div class="col-md-3">

 		 <div class="form-group">
		<h5>Semester <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="sem" id="sem"  required="" class="form-control">
			<option value="" selected="" disabled="">Select Semester</option>
			 
			<option value="1">Semester 1</option>
			<option value="2">Semester 2</option>
			<option value="3">Semester 3</option>
			<option value="4">Semester 4</option>
			<option value="5">Semester 5</option>
			<option value="6">Semester 6</option>
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 3 --> 




 			<div class="col-md-3" style="padding-top: 25px;">

  <a id="search" class="btn btn-primary" name="search"> Search</a>
	  
 			</div> <!-- End Col md 3 --> 		
			</div><!--  end row --> 


 <!-- Registration Fee table  -->


 <div class="row">
 	<div class="col-md-12">
 		<div id="DocumentResults">

 	<script id="document-template" type="text/x-handlebars-template">

 	<table class="table table-bordered table-striped" style="width: 100%">
 	<thead>
 		<tr>
        @{{{thsource}}}
 		</tr>
 	 </thead>
 	 <tbody>
 	 	@{{#each this}}
 	 	<tr>
 	 		@{{{tdsource}}}	
 	 	</tr>
 	 	@{{/each}}
 	 </tbody>
 	</table>
    </script>

    
 			
 		</div> 		
 	</div>
 	
 </div>
 


			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>


<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var sem = $('#sem').val();
     $.ajax({
      url: "{{ route('student.monthly.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id,'sem':sem},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>



@endsection
