<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BursarController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController; 
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CommunicateController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\FeesCollectionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BudgetController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']); 
Route::post('login', [AuthController::class, 'AuthLogin']); 
Route::get('logout', [AuthController::class, 'logout']); 
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);

 


//CHAT MODULE
Route::group(['middleware' => 'common'], function () {
    Route::get('chat', [ChatController::class, 'chat']);
    Route::post('submit_message', [ChatController::class, 'submit_message']); 
    Route::post('get_chat_windows', [ChatController::class, 'get_chat_windows']); 
    Route::post('get_chat_search_user', [ChatController::class, 'get_chat_search_user']); 


});


Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']); 
    Route::get('admin/admin/list', [AdminController::class, 'list']); 
    Route::get('admin/admin/add', [AdminController::class, 'add']); 
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']); 
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']); 
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']); 

    //class urls
    Route::get('admin/class/list', [ClassController::class, 'list']); 
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']); 
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']); 
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']); 

    //subject urls
    Route::get('admin/subject/list', [SubjectController::class, 'list']); 
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']); 
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']); 
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']); 

    //Assign_subject urls
    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']); 
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']); 
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']); 
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']); 
    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']); 
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);

    //Time Table urls
    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
    Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
    
    Route::post('admin/class_timetable/add', [ClassTimetableController::class, 'insert_update']);

    //Assign_teachers_to_classes urls
    Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']); 
    Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']); 
    Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']); 
    Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']); 
    Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']); 
    Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);

    //change_password urls
    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);

    //Student urls
    Route::get('admin/student/list', [StudentController::class, 'list']); 
    Route::get('admin/student/add', [StudentController::class, 'add']); 
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']); 
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

    //Bursar urls
    Route::get('admin/bursar/list', [BursarController::class, 'list']); 
    Route::get('admin/bursar/add', [BursarController::class, 'add']); 
    Route::post('admin/bursar/add', [BursarController::class, 'insert']);
    Route::get('admin/bursar/edit/{id}', [BursarController::class, 'edit']); 
    Route::post('admin/bursar/edit/{id}', [BursarController::class, 'update']);
    Route::get('admin/bursar/delete/{id}', [BursarController::class, 'delete']);

    //Teacher urls
     Route::get('admin/teacher/list', [TeacherController::class, 'list']); 
     Route::get('admin/teacher/add', [TeacherController::class, 'add']); 
     Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
     Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']); 
     Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
     Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);

    //Parent urls
    Route::get('admin/parent/list', [ParentController::class, 'list']); 
    Route::get('admin/parent/add', [ParentController::class, 'add']); 
    Route::post('admin/parent/add', [ParentController::class, 'insert']);
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']); 
    Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
    Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'AssignStudentParentDelete']);

    //My Admin Account Edit Urls
    Route::get('admin/account', [UserController::class, 'Myaccount']);
    Route::get('admin/setting', [UserController::class, 'Setting']);
    Route::post('admin/setting', [UserController::class, 'UpdateSetting']);
    Route::post('admin/account', [UserController::class, 'UpdateMyAccountAdmin']);

    //Examinations Urls
    Route::get('admin/examinations/exam/list', [ExaminationsController::class, 'exam_list']); 
    Route::get('admin/examinations/exam/add', [ExaminationsController::class, 'exam_add']); 
    Route::post('admin/examinations/exam/add', [ExaminationsController::class, 'exam_insert']); 
    Route::get('admin/examinations/exam/edit/{exam_id}', [ExaminationsController::class, 'exam_edit']); 
    Route::post('admin/examinations/exam/edit/{exam_id}', [ExaminationsController::class, 'exam_update']); 
    Route::get('admin/examinations/exam/delete/{exam_id}', [ExaminationsController::class, 'exam_delete']); 
    Route::get('admin/examinations/exam_schedule/', [ExaminationsController::class, 'exam_schedule']); 
    Route::post('admin/examinations/exam_schedule_insert', [ExaminationsController::class, 'exam_schedule_insert']); 
    Route::get('admin/examinations/marks_register', [ExaminationsController::class, 'marks_register']); 
    Route::post('admin/examinations/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('admin/examinations/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);
    Route::get('admin/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);

    //  Admin Grading System
    Route::get('admin/examinations/marks_grade', [ExaminationsController::class, 'marks_grade']); 
    Route::get('admin/examinations/marks_grade/add', [ExaminationsController::class, 'marks_grade_add']); 
    Route::post('admin/examinations/marks_grade/add', [ExaminationsController::class, 'marks_grade_insert']);
    Route::get('admin/examinations/marks_grade/edit/{id}', [ExaminationsController::class, 'marks_grade_edit']); 
    Route::post('admin/examinations/marks_grade/edit/{id}', [ExaminationsController::class, 'marks_grade_update']); 
    Route::get('admin/examinations/marks_grade/delete/{id}', [ExaminationsController::class, 'marks_grade_delete']);

    //ADMIN ATTENDANCE STUDENTS
    Route::get('admin/attendance/student_attendance', [AttendanceController::class, 'AttendanceStudent']);
    Route::post('admin/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);
    Route::get('admin/attendance/report', [AttendanceController::class, 'AttendanceReport']);
    Route::post('admin/attendance/report_export_excel', [AttendanceController::class, 'AttendanceStudentExportExcel']);

     
    
    
    //COMMUNICATION MODULE URLS
    Route::get('admin/communicate/notice_board', [CommunicateController::class, 'NoticeBoard']);
    Route::get('admin/communicate/notice_board/add', [CommunicateController::class, 'AddNoticeBoard']);
    Route::post('admin/communicate/notice_board/add', [CommunicateController::class, 'InsertNoticeBoard']);

    Route::get('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'EditNoticeBoard']);
    Route::post('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'InsertNoticeBoard']);
    Route::post('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'UpdateNoticeBoard']);
    Route::get('admin/communicate/notice_board/delete/{id}', [CommunicateController::class, 'DeleteNoticeBoard']);

    //Send Emails routes
    Route::get('admin/communicate/send_email', [CommunicateController::class, 'SendEmail']);
    Route::post('admin/communicate/send_email', [CommunicateController::class, 'SendEmailUser']);
    Route::get('admin/communicate/search_user', [CommunicateController::class, 'SearchUser']);
    

    //Admin Homework Controllers
    Route::get('admin/homework/studenthomework', [HomeworkController::class, 'homework']);
    Route::get('admin/homework/studenthomework/add', [HomeworkController::class, 'add']);
    Route::post('admin/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']);
    Route::post('admin/homework/studenthomework/add', [HomeworkController::class, 'insert']);
    Route::get('admin/homework/studenthomework/edit/{id}', [HomeworkController::class, 'edit']);
    Route::post('admin/homework/studenthomework/edit/{id}', [HomeworkController::class, 'update']);
    Route::get('admin/homework/studenthomework/delete/{id}', [HomeworkController::class, 'delete']);
    Route::get('admin/homework/studenthomework/submitted/{id}', [HomeworkController::class, 'submitted']);
    Route::get('admin/homework/homework_report', [HomeworkController::class, 'homework_report']);
    

    //Admin Fees Collection Controllers
    Route::get('admin/fees_collection/collect_fees', [FeesCollectionController::class, 'collect_fees']);
    Route::get('admin/fees_collection/collect_fees_report', [FeesCollectionController::class, 'collect_fees_report']);
    Route::get('admin/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'collect_fees_add']);
    Route::post('admin/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'collect_fees_insert']);

    //excel
    Route::post('admin/fees_collection/export_collect_fees_report', [FeesCollectionController::class, 'export_collect_fees_report']);


    
    
});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']); 

    //change_password urls
    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);
    Route::get('student/account', [UserController::class, 'Myaccount']);
    Route::post('student/account', [UserController::class, 'UpdateMyaccountStudent']);
    Route::get('student/my_subject', [SubjectController::class, 'MySubject']);
    Route::get('student/my_timetable', [ClassTimetableController::class, 'MyTimetable']);
    Route::get('student/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetable']);
    Route::get('student/my_calendar', [CalendarController::class, 'MyCalendar']);
    Route::get('student/my_exam_result', [ExaminationsController::class, 'myExamResult']); 
    Route::get('student/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']); 
    Route::get('student/my_notice_board', [CommunicateController::class, 'MyNoticeBoardStudent']); 
    Route::get('student/my_homework/', [HomeworkController::class, 'HomeworkStudent']); 
    Route::get('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomework']);
    Route::post('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomeworkInsert']);
    Route::get('student/my_submitted_homework/', [HomeworkController::class, 'HomeworkSubmittedStudent']); 

    //Fees Collection
    Route::get('student/fees_collection', [FeesCollectionController::class, 'CollectFeesStudent']);
    Route::post('student/fees_collection', [FeesCollectionController::class, 'CollectFeesStudentPayment']);
    Route::get('student/paypal/payment-error', [FeesCollectionController::class, 'PaymentError']);
    Route::get('student/paypal/payment-success', [FeesCollectionController::class, 'PaymentSuccess']);
    //stripe
    Route::get('student/stripe/payment-error', [FeesCollectionController::class, 'PaymentError']);
    Route::get('student/stripe/payment-success', [FeesCollectionController::class, 'PaymentSuccessStripe']);
    
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']); 

    //change_password urls
    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
    Route::get('teacher/account', [UserController::class, 'Myaccount']);
    Route::post('teacher/account', [UserController::class, 'UpdateMyaccount']);
    
    Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);
    Route::get('teacher/my_student', [StudentController::class, 'MyStudent']);
    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}', [ClassTimetableController::class, 'MyTimetableTeacher']);
    Route::get('teacher/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetableTeacher']);

    Route::get('teacher/marks_register', [ExaminationsController::class, 'marks_register_teacher']); 
    Route::post('teacher/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('teacher/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);

    Route::get('teacher/my_notice_board', [CommunicateController::class, 'MyNoticeBoardTeacher']); 
    Route::get('teacher/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);


    //Teacher's Homework Controllers
    Route::get('teacher/homework/studenthomework', [HomeworkController::class, 'HomeworkTeacher']);
    Route::get('teacher/homework/studenthomework/add', [HomeworkController::class, 'addTeacher']);
    Route::post('teacher/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']);
    Route::post('teacher/homework/studenthomework/add', [HomeworkController::class, 'insertTeacher']);
    Route::get('teacher/homework/studenthomework/edit/{id}', [HomeworkController::class, 'editTeacher']);
    Route::post('teacher/homework/studenthomework/edit/{id}', [HomeworkController::class, 'updateTeacher']);
    Route::get('teacher/homework/studenthomework/delete/{id}', [HomeworkController::class, 'delete']);

    Route::get('teacher/homework/studenthomework/submitted/{id}', [HomeworkController::class, 'submittedTeacher']);

    
    //Teacher's ATTENDANCE STUDENTS
    Route::get('teacher/attendance/student', [AttendanceController::class, 'AttendanceStudentTeacher']);
    Route::post('teacher/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);
    Route::get('teacher/attendance/report', [AttendanceController::class, 'AttendanceReport']);

    //Teacher's Calender
    Route::get('teacher/my_calendar', [CalendarController::class, 'MyCalendar']);



});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']); 

    //change_password urls
    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);
    Route::get('parent/account', [UserController::class, 'Myaccount']);
    Route::post('parent/account', [UserController::class, 'UpdateMyaccountParent']);
    Route::get('parent/my_student', [ParentController::class, 'myStudentParent']);
    Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'ParentStudentSubject']);
    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}', [ClassTimetableController::class, 'MyTimetableParent']);
    Route::get('parent/my_student/exam_result/{student_id}', [ExaminationsController::class, 'ParentExamResult']);
    Route::get('parent/my_notice_board', [CommunicateController::class, 'MyNoticeBoardParent']);
    Route::get('parent/my_student/fees_collection/{student_id}', [FeesCollectionController::class, 'CollectFeesStudentParent']);
    Route::get('parent/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);
   
    

    
});


Route::group(['middleware' => 'bursar'], function () {

    Route::get('bursar/dashboard', [DashboardController::class, 'dashboard']); 
    Route::get('bursar/student/list', [StudentController::class, 'bursar_list']); 
    Route::get('bursar/parent/listb', [ParentController::class, 'list_bursar']); 
    Route::get('bursar/parent/my-student/{id}', [ParentController::class, 'myStudentBursar']);

    //COMMUNICATION MODULE URLS
    Route::get('bursar/communicate/sms', [CommunicateController::class, 'SMS']);
    Route::get('bursar/communicate/sms/add', [CommunicateController::class, 'findSMSPage']);
    Route::post('bursar/communicate/sms/add', [CommunicateController::class, 'SendSMS']);

    //Send Emails routes
    Route::get('bursar/communicate/send_email', [CommunicateController::class, 'SendEmailBursar']);
    Route::post('bursar/communicate/send_email', [CommunicateController::class, 'SendEmailUser']);
    Route::get('bursar/communicate/search_user', [CommunicateController::class, 'SearchUser']);

     //Bursar Fees Collection Controllers
     Route::get('bursar/fees_collection/collect_fees', [FeesCollectionController::class, 'collect_fees_bursar']);
     Route::get('bursar/fees_collection/collect_fees_report', [FeesCollectionController::class, 'collect_fees_report']);
     Route::get('bursar/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'collect_fees_add_bursar']);
     Route::post('bursar/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'collect_fees_insert']);
     
     // Inventory Routes 
    Route::get('bursar/inventory/procurement', [InventoryController::class, 'list']); 
    Route::get('bursar/inventory/add', [InventoryController::class, 'add']); 
    Route::post('bursar/inventory/add', [InventoryController::class, 'insert']); 
    Route::get('bursar/inventory/edit/{id}', [InventoryController::class, 'edit']); 
    Route::post('bursar/inventory/edit/{id}', [InventoryController::class, 'update']); 
    Route::get('bursar/inventory/delete/{id}', [InventoryController::class, 'delete']); 

    //Budget
    Route::get('bursar/inventory/budget', [BudgetController::class, 'budget_list']); 
    Route::get('bursar/inventory/addbudget', [BudgetController::class, 'add']); 
    Route::post('bursar/inventory/addbudget', [BudgetController::class, 'insert']); 
    Route::get('bursar/inventory/editbudget/{id}', [BudgetController::class, 'edit']); 
    Route::post('bursar/inventory/editbudget/{id}', [BudgetController::class, 'update']); 
    Route::get('bursar/inventory/deletebudget/{id}', [BudgetController::class, 'delete']); 
 
   
     
    //Bursar Account Edit Urls
    Route::get('bursar/account', [UserController::class, 'Myaccount']);
    Route::post('bursar/account', [UserController::class, 'UpdateMyAccountBursar']);
    Route::get('bursar/change_password', [UserController::class, 'change_password']);
    Route::post('bursar/change_password', [UserController::class, 'update_change_password']);
});