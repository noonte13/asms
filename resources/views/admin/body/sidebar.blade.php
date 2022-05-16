@php 
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Admin</b> Dashboard</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
      <li class="{{ ($route == 'dashboard')?'active':'' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		@if(Auth::user()->role == 'Admin')
        <li class="treeview {{ ($prefix == '/users')?'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'user.view')?'active':'' }}"><a href="{{ route('user.view') }}"><i class="ti-more"></i>View Users</a></li>
            <li class="{{ ($route == 'user.add')?'active':'' }}"><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 
        @endif  
        <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'profile.view')?'active':'' }}"><a href="{{ route('profile.view') }}"><i class="ti-more"></i>View Profile</a></li>
            <li class="{{ ($route == 'profile.edit')?'active':'' }}"><a href="{{ route('profile.edit') }}"><i class="ti-more"></i>Edit Profile</a></li>
            <li class="{{ ($route == 'password.edit')?'active':'' }}"><a href="{{ route('password.edit') }}"><i class="ti-more"></i>Change Password</a></li>
          </ul>
        </li> 

        <li class="treeview {{ ($prefix == '/setup')?'active':'' }}">
          <a href="#">
            <i data-feather="grid"></i> <span>Manage School Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'student.class.view')?'active':'' }}"><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Classes</a></li>
            <li class="{{ ($route == 'student.year.view')?'active':'' }}"><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Academic Years</a></li>
            <li class="{{ ($route == 'student.group.view')?'active':'' }}"><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Education Sections</a></li>
            <li class="{{ ($route == 'student.shift.view')?'active':'' }}"><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Class Shifts</a></li>
            <li class="{{ ($route == 'student.fee.view')?'active':'' }}"><a href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Fee Categories</a></li>
            <li class="{{ ($route == 'student.feeamnt.view')?'active':'' }}"><a href="{{ route('student.feeamnt.view') }}"><i class="ti-more"></i>Fee Amounts</a></li>
            <li class="{{ ($route == 'exam.type.view')?'active':'' }}"><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exams</a></li>
            <li class="{{ ($route == 'school.subject.view')?'active':'' }}"><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Subjects</a></li>
            <li class="{{ ($route == 'assign.subject.view')?'active':'' }}"><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subjects</a></li>
            <li class="{{ ($route == 'school.designation.view')?'active':'' }}"><a href="{{ route('school.designation.view') }}"><i class="ti-more"></i>Designations</a></li>

          </ul>
        </li> 

        <li class="treeview {{ ($prefix == '/student')?'active':'' }}">
          <a href="#">
            <i data-feather="grid"></i> <span>Manage Student Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'student.registration.view')?'active':'' }}">
              <a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Registration</a></li>
            <li class="{{ ($route == 'roll.generate.view')?'active':'' }}">
              <a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generation</a></li>
            <li class="{{ ($route == 'registration.fee.view')?'active':'' }}">
              <a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>View Registration Fee</a></li>
            <li class="{{ ($route == 'monthly.fee.view')?'active':'' }}">
              <a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>View Semester Fee</a></li>
            <li class="{{ ($route == 'exam.fee.view')?'active':'' }}">
              <a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>View Exam Fee</a></li>


          </ul>
        </li> 
		 
        <li class="header nav-small-cap">XX</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>XXX</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>xxx</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>xxx</a></li>
          </ul>
        </li>
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>