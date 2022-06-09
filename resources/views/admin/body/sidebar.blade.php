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
						  <img src="{{ asset('backend/images/logo.png') }}" alt="">
						  <h3><b>School</b> Management</h3>
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

        <li class="header nav-small-cap">User</li>

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

        <li class="header nav-small-cap">School</li>

        <li class="treeview {{ ($prefix == '/setup')?'active':'' }}">
          <a href="#">
            <i data-feather="grid"></i> <span>School Setup </span>
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
            <i data-feather="edit-2"></i> <span>Student Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'student.registration.view')?'active':'' }}">
              <a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student Registration</a></li>
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

        <li class="treeview {{ ($prefix == '/employee')?'active':'' }}">
          <a href="#">
            <i data-feather="credit-card"></i> <span>Employee Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'employee.registration.view')?'active':'' }}">
              <a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Employee Registration</a></li>
            <li class="{{ ($route == 'employee.salary.view')?'active':'' }}">
              <a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
            <li class="{{ ($route == 'employee.leave.view')?'active':'' }}">
              <a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a></li>
            <li class="{{ ($route == 'employee.attendance.view')?'active':'' }}">
              <a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee Attendance</a></li>
            <li class="{{ ($route == 'employee.monthly.salary')?'active':'' }}">
              <a href="{{ route('employee.monthly.salary') }}"><i class="ti-more"></i>Monthly Salary Details</a></li>


          </ul>
        </li> 

        <li class="treeview {{ ($prefix == '/mark')?'active':'' }}">
          <a href="#">
            <i data-feather="layers"></i> <span>Grading Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'marks.entry.add')?'active':'' }}">
              <a href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Add Markings</a></li>
            <li class="{{ ($route == 'marks.entry.edit')?'active':'' }}">
              <a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Edit Markings</a></li>
            <li class="{{ ($route == 'marks.entry.grade')?'active':'' }}">
              <a href="{{ route('marks.entry.grade') }}"><i class="ti-more"></i>Gradings </a></li>

          </ul>
        </li> 

        <li class="treeview {{ ($prefix == '/finance')?'active':'' }}">
          <a href="#">
            <i data-feather="pie-chart"></i> <span>Finance Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'fee.view')?'active':'' }}">
              <a href="{{ route('fee.view') }}"><i class="ti-more"></i>Student Fees</a></li>
            <li class="{{ ($route == 'account.salary.view')?'active':'' }}">
              <a href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
            <li class="{{ ($route == 'other.cost.view')?'active':'' }}">
              <a href="{{ route('other.cost.view') }}"><i class="ti-more"></i>Additional Costs</a></li>

          </ul>
        </li> 
		 
        <li class="header nav-small-cap">Reports</li>
		  
        <li class="treeview {{ ($prefix == '/report')?'active':'' }}">
          <a href="#">
            <i data-feather="map"></i> <span>Reports Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="{{ ($route == 'monthly.profit.view')?'active':'' }}">
            <a href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Monthly-Yearly Profit</a></li> 
          <li class="{{ ($route == 'marksheet.generate.view')?'active':'' }}">
            <a href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>Generate MarkSheets</a></li>
          <li class="{{ ($route == 'attendance.report.view')?'active':'' }}">
            <a href="{{ route('attendance.report.view') }}"><i class="ti-more"></i>Attendance Report</a></li>
 <!--          <li class="{{ ($route == 'student.result.view')?'active':'' }}">
           <a href="{{ route('student.result.view') }}"><i class="ti-more"></i>Student Result</a></li> -->
          <li class="{{ ($route == 'student.idcard.view')?'active':'' }}">
            <a href="{{ route('student.idcard.view') }}"><i class="ti-more"></i>Student Class Details</a></li> 

          </ul>
        </li>
      </ul>
    </section>
	
	<div class="sidebar-footer">
		
<!--		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
	
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
 -->
		<a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>