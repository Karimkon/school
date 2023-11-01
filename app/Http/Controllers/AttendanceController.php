<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\StudentAttendanceModel;
use App\Models\AssignClassTeacherModel;
use Auth;

class AttendanceController extends Controller
{
    public function AttendanceStudent(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->get('class_id')) && !empty($request->get('attendance_date')))
        {
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));

        }
        $data['header_title'] = "STUDENT ATTENDANCE";
        return view('admin.attendance.student', $data);
    }

    public function AttendanceStudentSubmit(Request $request)
    {
        $check_attendance = StudentAttendanceModel::CheckAlreadyAttendance($request->student_id,$request->class_id,$request->attendance_date);
        if(!empty($check_attendance))
        {
            $attendance = $check_attendance;
        }
        else
        {
        $attendance = new StudentAttendanceModel;
        $attendance->student_id = $request->student_id; 
        $attendance->class_id = $request->class_id; 
        $attendance->attendance_date = $request->attendance_date; 
        $attendance->created_by = Auth::user()->id;

        }
        $attendance->attendance_type = $request->attendance_type; 
        $attendance->save();

        $json['message'] = "Student Attendance Saved Successfully";
        echo json_encode($json);

    }

    public function AttendanceReport(Request $request)
        {
            $data['getClass'] = ClassModel::getClass();
            $data['getRecord'] = StudentAttendanceModel::getRecord();
            $data['header_title'] = "STUDENT ATTENDANCE REPORT";
            return view('admin.attendance.report', $data);            
        }

    public function AttendanceStudentTeacher(Request $request)
    {       
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);

        if(!empty($request->get('class_id')) && !empty($request->get('attendance_date')))
        {
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));

        }
        $data['header_title'] = "STUDENT ATTENDANCE";
        return view('teacher.attendance.student', $data);

    }
}
