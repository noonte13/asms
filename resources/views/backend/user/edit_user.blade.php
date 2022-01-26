@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit User</h4>
			  <h6 class="box-subtitle">Please fill in required update fields.</a></h6>
			</div>
			<!-- /.box-header -->

            
			<div class="box-body">
			  <div class="row">
				<div class="col">
<form method="post" action="{{ route('user.update',$editData->id) }}">
	@csrf
					  <div class="row">
						<div class="col-12">
 <div class="row">
     <div class="col-md-6">

     <div class="form-group">
		<h5>User Type <span class="text-danger">*</span></h5>
		<div class="controls">
		<select name="roll" id="roll" required="" class="form-control">
		<option value="" selected="" disabled="" >Select Role</option>
		<option value="Admin" {{ ($editData->roll == "Admin" ? "selected": "")}}>Admin</option>
		<option value="User" {{ ($editData->roll == "User" ? "selected": "")}}>Basic</option>
</select>
	</div>
</div>                       
</div>

<div class="col-md-6">
<div class="form-group">
	<h5>User Name <span class="text-danger">*</span></h5>
	<div class="controls">
	<input type="text" name="name" class="form-control" value="{{ $editData -> name }}" required="" ></div>
	</div>
							
</div>
</div> <!--Row Finish-->


<div class="row">
<div class="col-md-6">
		 
		 <div class="form-group">
			 <h5>Email <span class="text-danger">*</span></h5>
			 <div class="controls">
			 <input type="email" name="email" class="form-control" value="{{ $editData -> email }}" required="" ></div>
			 </div>
									 
		 </div>

<div class="col-md-6">
		 
	
</div> <!--Row Finish-->


						<div class="text-xs-right">
							<input type="submit" class="btn btn-info mb-5" value="Update" >
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	  
	  </div>
  </div>

@endsection