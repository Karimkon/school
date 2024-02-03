<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\StudentAddFeesModel;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\AssignClassTeacherModel;
use App\Models\NoticeBoardModel;
use App\Models\ClassSubjectModel;
use App\Models\HomeworkModel;
use App\Models\HomeworkSubmitModel;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->user_type == 1)
        {
            $data['getTotalTodayFees'] = StudentAddFeesModel::getTotalTodayFees();
            $data['getTotalFees'] = StudentAddFeesModel::getTotalFees();
            $data['TotalExam'] = ExamModel::getTotalExam();
            $data['TotalClass'] = ClassModel::getTotalClass();
            $data['TotalSubject'] = SubjectModel::getTotalSubject();

            $data['TotalAdmin'] = User::getTotalUser(1);
            $data['TotalStudent'] = User::getTotalUser(2);
            $data['TotalTeacher'] = User::getTotalUser(3);
            $data['TotalParent'] = User::getTotalUser(5);

            return view('admin.dashboard', $data);
        }
        else if (Auth::user()->user_type == 4)
        {
            $data['getTotalTodayFees'] = StudentAddFeesModel::getTotalTodayFees();
            $data['getTotalFees'] = StudentAddFeesModel::getTotalFees();
            $data['TotalStudent'] = User::getTotalUser(2);
            $data['TotalTeacher'] = User::getTotalUser(3);
            $data['TotalParent'] = User::getTotalUser(5);

            return view('bursar.dashboard', $data);
        }
        else if (Auth::user()->user_type == 2)
        {
            $data['TotalPaidAmount'] = StudentAddFeesModel::TotalPaidAmountStudent(Auth::user()->id);
            $data['TotalSubject'] = ClassSubjectModel::MySubjectTotal(Auth::user()->class_id);
            $data['TotalNoticeBoard'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
            $data['TotalHomework'] = HomeworkModel::getRecordStudentCount(Auth::user()->class_id, Auth::user()->id);
            $data['TotalSubmittedHomework'] = HomeworkSubmitModel::getRecordStudentCount(Auth::user()->id);

            return view('student.dashboard', $data);                
        }
        else if (Auth::user()->user_type == 3)
        {
            
            $data['TotalClass'] = AssignClassTeacherModel::getMyClassSubjectGroupCount(Auth::user()->id);
            $data['TotalSubject'] = AssignClassTeacherModel::getMyClassSubjectCount(Auth::user()->id);
            $data['TotalNoticeBoard'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
            $data['TotalStudent'] = User::getTotalStudentCount(Auth::user()->id);
            
            return view('teacher.dashboard', $data);             
        }
        else if(Auth::user()->user_type == 5)
        {
            $data['TotalNoticeBoard'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
            $data['TotalStudent'] = User::getMyStudentCount(Auth::user()->id);            
            return view('parent.dashboard', $data);            
        } 

        else if(Auth::user()->user_type == 6)
        {
            $data['TotalBooks'] = '';            
            return view('librarian.dashboard', $data);            
        } 

    }
}
