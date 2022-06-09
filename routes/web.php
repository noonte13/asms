<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentFeeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;

use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;

use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;

use App\Http\Controllers\Backend\DefaultController;

use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Marks\GradeController;

use App\Http\Controllers\Backend\Account\FeeController;
use App\Http\Controllers\Backend\Account\AccountSalaryController;
use App\Http\Controllers\Backend\Account\OtherCostController;

use App\Http\Controllers\Backend\Report\ProfitController;
use App\Http\Controllers\Backend\Report\MarkSheetController;
use App\Http\Controllers\Backend\Report\AttendanceReportController;
use App\Http\Controllers\Backend\Report\ResultReportController;
use App\Http\Controllers\Backend\Report\StudentIdController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'prevent-back-history'],function(){


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'],function(){

// USER ROUTES

Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

});

// PROFILE ROUTES

Route::prefix('profile')->group(function(){

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/edit', [ProfileController::class, 'PasswordEdit'])->name('password.edit');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});

// SCHOOL SETUP ROUTES - STUDENT CLASS

Route::prefix('setup')->group(function(){

    // STUDENT CLASS
    Route::get('student/class/view', [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
    Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');

    // STUDENT YEAR
    Route::get('student/year/view', [StudentYearController::class, 'StudentYearView'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
    Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('student.year.store');
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');

    // STUDENT GROUP
    Route::get('student/group/view', [StudentGroupController::class, 'StudentGroupView'])->name('student.group.view');
    Route::get('student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
    Route::post('student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('student.group.store');
    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');

    // STUDENT SHIFT
    Route::get('student/shift/view', [StudentShiftController::class, 'StudentShiftView'])->name('student.shift.view');
    Route::get('student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
    Route::post('student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('student.shift.store');
    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');

    // FEE CATEGORY
    Route::get('student/fee-category/view', [StudentFeeController::class, 'StudentFeeCatView'])->name('student.fee.view');
    Route::get('student/fee-category/add', [StudentFeeController::class, 'StudentFeeCatAdd'])->name('student.fee.add');
    Route::post('student/fee-category/store', [StudentFeeController::class, 'StudentFeeCatStore'])->name('student.fee.store');
    Route::get('student/fee-category/edit/{id}', [StudentFeeController::class, 'StudentFeeCatEdit'])->name('student.fee.edit');
    Route::get('student/fee-category/delete/{id}', [StudentFeeController::class, 'StudentFeeCatDelete'])->name('student.fee.delete');
    Route::post('student/fee-category/update/{id}', [StudentFeeController::class, 'StudentFeeCatUpdate'])->name('student.fee.update');

    // FEE AMOUNT
    Route::get('student/fee-amount/view', [FeeAmountController::class, 'StudentFeeAmntView'])->name('student.feeamnt.view');
    Route::get('student/fee-amount/add', [FeeAmountController::class, 'StudentFeeAmntAdd'])->name('student.feeamnt.add');
    Route::post('student/fee-amount/store', [FeeAmountController::class, 'StudentFeeAmntStore'])->name('student.feeamnt.store');
    Route::get('student/fee-amount/edit/{id}', [FeeAmountController::class, 'StudentFeeAmntEdit'])->name('student.feeamnt.edit');
    Route::get('student/fee-amount/delete/{id}', [FeeAmountController::class, 'StudentFeeAmntDelete'])->name('student.feeamnt.delete');
    Route::post('student/fee-amount/update/{id}', [FeeAmountController::class, 'StudentFeeAmntUpdate'])->name('student.feeamnt.update');
    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'StudentFeeAmntDetails'])->name('student.feeamnt.details');

    // EXAM TYPES
    Route::get('exam/type/view', [ExamTypeController::class, 'ExamTypeView'])->name('exam.type.view');
    Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
    Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');

    // SUBJECTS
    Route::get('school/subject/view', [SchoolSubjectController::class, 'SubjectView'])->name('school.subject.view');
    Route::get('school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('school.subject.store');
    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');
    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('school.subject.update');

    // ASSIGN SUBJECTS
    Route::get('school/assign-subject/view', [AssignSubjectController::class, 'AssignSubjectView'])->name('assign.subject.view');
    Route::get('school/assign-subject/add', [AssignSubjectController::class, 'AssignSubjectAdd'])->name('assign.subject.add');
    Route::post('school/assign-subject/store', [AssignSubjectController::class, 'AssignSubjectStore'])->name('assign.subject.store');
    Route::get('school/assign-subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');
    Route::get('school/assign-subject/delete/{id}', [AssignSubjectController::class, 'AssignSubjectDelete'])->name('assign.subject.delete');
    Route::post('school/assign-subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('assign.subject.update');
    Route::get('school/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetailsView'])->name('assign.subject.details');

    // DESIGNATIONS
    Route::get('school/designation/view', [DesignationController::class, 'DesignationView'])->name('school.designation.view');
    Route::get('school/designation/add', [DesignationController::class, 'DesignationAdd'])->name('school.designation.add');
    Route::post('school/designation/store', [DesignationController::class, 'DesignationStore'])->name('school.designation.store');
    Route::get('school/designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('school.designation.edit');
    Route::get('school/designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('school.designation.delete');
    Route::post('school/designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('school.designation.update');

});

// STUDENT SETUP ROUTES

Route::prefix('student')->group(function(){

     // STUDENT REGISTRATION ROUTES
    Route::get('/registration/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
    Route::get('/registration/add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
    Route::post('/registration/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise'); 
    Route::get('/registration/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
    Route::post('/registration/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
    Route::get('/registration/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
    Route::post('/registration/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
    Route::get('/registration/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');
    
    // STUDENT ROLL ROUTES 
    Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
    Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
    Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

    // REG FEE ROUTES
   Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');
   Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
   Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');

    // SEM FEE ROUTES
   Route::get('/sem/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
   Route::get('/sem/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
   Route::get('/sem/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

    // EXAM FEE ROUTES 
   Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
   Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
   Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');
   
});

// EMPLOYEE ROUTES
Route::prefix('employee')->group(function(){

     //EMPLOYEE REG ROUTES
    Route::get('reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');
    Route::get('reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');
    Route::post('reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
    Route::get('reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');
    Route::post('reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');
    Route::get('reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');
    Route::get('reg/employee/delete/{id}', [EmployeeRegController::class, 'EmployeeDelete'])->name('employee.registration.delete');

     // EMP SALARY ROUTES
    Route::get('employee/salary/view', [EmployeeSalaryController::class, 'SalaryView'])->name('employee.salary.view');
    Route::get('employee/salary/increment/{id}', [EmployeeSalaryController::class, 'SalaryIncrement'])->name('employee.salary.increment');
    Route::post('employee/salary/store/{id}', [EmployeeSalaryController::class, 'SalaryStore'])->name('update.increment.store');
    Route::get('employee/salary/details/{id}', [EmployeeSalaryController::class, 'SalaryDetails'])->name('employee.salary.details');

     // EMP LEAVE ROUTES
    Route::get('employee/leave/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
    Route::get('employee/leave/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');    
    Route::post('employee/leave/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');    
    Route::get('employee/leave/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');
    Route::post('employee/leave/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');     
    Route::get('employee/leave/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');


     // EMP ATTENDANCE ROUTES
    Route::get('employee/attendance/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');
    Route::get('employee/attendance/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');
    Route::post('employee/attendance/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');
    Route::get('employee/attendance/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');
    Route::get('employee/attendance/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');

     // EMP MONTHLY SAL ROUTES
    Route::get('employee/monthlysalary/view', [MonthlySalaryController::class, 'MonthlySalaryView'])->name('employee.monthly.salary');
    Route::get('employee/monthlysalary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');
    Route::get('employee/monthlysalary/payslip/{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');

});

// MARKS & GRADING ROUTES 
Route::prefix('marks')->group(function(){

    //MARKS ENTRY ROUTES
    Route::get('marks/entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');   
    Route::post('marks/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store');    
    Route::get('marks/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');    
    Route::get('marks/getstudents/edit', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');  
    Route::post('marks/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');  

    //GRADE ROUTES

    Route::get('marks/grade/view', [GradeController::class, 'MarksGradeView'])->name('marks.entry.grade');
    Route::get('marks/grade/add', [GradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');
    Route::post('marks/grade/store', [GradeController::class, 'MarksGradeStore'])->name('store.marks.grade');
    Route::get('marks/grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
    Route::post('marks/grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('update.marks.grade');

}); 
 
//GET STUDENT & SUBJECT FOR MARKS
Route::get('marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
Route::get('student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');


// FINANCE ALL ROUTES  
Route::prefix('finance')->group(function(){

    // STUDENT FEE
    Route::get('student/fee/view', [FeeController::class, 'FeeView'])->name('fee.view'); 
    Route::get('student/fee/add', [FeeController::class, 'FeeAdd'])->name('fee.add'); 
    Route::get('student/fee/getstudent', [FeeController::class, 'StudentFeeGetStudent'])->name('account.fee.getstudent');  
    Route::post('student/fee/store', [FeeController::class, 'StudentFeeStore'])->name('account.fee.store'); 
    
    // EMP SALARY
    Route::get('account/salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');
    Route::get('account/salary/add', [AccountSalaryController::class, 'AccountSalaryAdd'])->name('account.salary.add');
    Route::get('account/salary/getemployee', [AccountSalaryController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');
    Route::post('account/salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');
      
    // OTHER COSTS
    Route::get('other/cost/view', [OtherCostController::class, 'OtherCostView'])->name('other.cost.view');
    Route::get('other/cost/add', [OtherCostController::class, 'OtherCostAdd'])->name('other.cost.add');
    Route::post('other/cost/store', [OtherCostController::class, 'OtherCostStore'])->name('store.other.cost');
    Route::get('other/cost/edit/{id}', [OtherCostController::class, 'OtherCostEdit'])->name('edit.other.cost');
    Route::post('other/cost/update/{id}', [OtherCostController::class, 'OtherCostUpdate'])->name('update.other.cost');
    Route::get('other/cost/delete/{id}', [OtherCostController::class, 'OtherCostDelete'])->name('delete.other.cost');
    
    }); 


/// REPORT ROUTES 
Route::prefix('report')->group(function(){

    Route::get('monthly/profit/view', [ProfitController::class, 'MonthlyProfitView'])->name('monthly.profit.view');
    Route::get('monthly/profit/datewise', [ProfitController::class, 'MonthlyProfitDatewise'])->name('report.profit.datewise.get');
    Route::get('monthly/profit/pdf', [ProfitController::class, 'MonthlyProfitPdf'])->name('report.profit.pdf');
    
    // MARKSHEET REPORT
    Route::get('marksheet/generate/view', [MarkSheetController::class, 'MarkSheetView'])->name('marksheet.generate.view');
    Route::get('marksheet/generate/get', [MarkSheetController::class, 'MarkSheetGet'])->name('report.marksheet.get');
    
    // ATTENDANCE REPORT
    Route::get('attendance/report/view', [AttendanceReportController::class, 'AttenReportView'])->name('attendance.report.view');
    Route::get('report/attendance/get', [AttendanceReportController::class, 'AttenReportGet'])->name('report.attendance.get');
    
    // STUDENT RESULT REPORT 
    Route::get('student/result/view', [ResultReportController::class, 'ResultView'])->name('student.result.view');
    Route::get('student/result/get', [ResultReportController::class, 'ResultGet'])->name('report.student.result.get');
    
    // STUDENT ID REPORT
    Route::get('student/idcard/view', [StudentIdController::class, 'IdcardView'])->name('student.idcard.view'); 
    Route::get('student/idcard/get', [StudentIdController::class, 'IdcardGet'])->name('report.student.idcard.get');
    
    }); 


}); // END MIDDLEWARE AUTHENTICATION

}); // END PREVENT BACK BUTTON BROWSER

 
