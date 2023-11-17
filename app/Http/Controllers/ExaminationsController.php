<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\AssignClassTeacherModel;
use App\Models\MarksRegisterModel;
use App\Models\User;
use App\Models\MarksGradeModel;
use App\Models\SettingModel;

class ExaminationsController extends Controller
{
    static public function getSingle($id)
    {
        return self::find($id);
    }
    
    public function exam_list()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = "Exam List";
        return view('admin.examinations.exam.list', $data);
    } 

    public function exam_add()
    {
        $data['header_title'] = "Add New Exam";
        return view('admin.examinations.exam.add', $data);
    } 

    public function exam_insert(Request $request)    
    {
        $exam = new ExamModel;
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam Successfully created");

    }

    public function exam_edit($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Exam";
            return view('admin.examinations.exam.edit', $data);
        }
        else
        {
            abort(404);
        }
       
    }


    public function exam_update($id, Request $request)    
    {
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam Successfully Updated");

    }



    public function exam_delete($id)
    {
        $getRecord = ExamModel::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete =1;
            $getRecord->save();

            return redirect()->back()->with('success', "Exam Successfully deleted");
        }
        else
        {
            abort(404);
        }
       
    }
    public function exam_schedule(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();
        $result = array();   
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));
            foreach($getSubject as $value)
            {
                $dataS = array(); 
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;

                $ExamSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'),$request->get('class_id'), $value->subject_id);
                if(!empty($ExamSchedule))
                {
                    $dataS['exam_date'] = $ExamSchedule->exam_date;
                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] = $ExamSchedule->end_time;
                    $dataS['room_number'] = $ExamSchedule->room_number;
                    $dataS['full_marks'] = $ExamSchedule->full_marks;
                    $dataS['passing_mark'] = $ExamSchedule->passing_mark;
                }
                else
                {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_mark'] = '';
                }
                $result[] = $dataS;
            }
        }

        $data['getRecord'] = $result;
        $data['header_title'] = "Add New Exam Schedule";
        return view('admin.examinations.exam_schedule', $data);
    }

    public function exam_schedule_insert(Request $request)
    {
        ExamScheduleModel::deleteRecord($request->exam_id, $request->class_id);
        if(!empty($request->schedule))
        {
            foreach($request->schedule as $schedule)
            {
                if(!empty($schedule['subject_id']) && !empty($schedule['exam_date']) && !empty($schedule['start_time']) && !empty($schedule['end_time'])
                && !empty($schedule['room_number']) && !empty($schedule['full_marks']) && !empty($schedule['passing_mark']))
                {
                $exam = new ExamScheduleModel;
                $exam->exam_id = $request->exam_id;
                $exam->class_id = $request->class_id;
                $exam->subject_id = $schedule['subject_id'];
                $exam->exam_date = $schedule['exam_date'];
                $exam->start_time = $schedule['start_time'];
                $exam->end_time = $schedule['end_time'];
                $exam->room_number = $schedule['room_number'];
                $exam->full_marks = $schedule['full_marks'];
                $exam->passing_mark = $schedule['passing_mark'];
                $exam->created_by = Auth::user()->id;
                $exam->save();
                }

            }
        }
        return redirect()->back()->with('success', "Exam Schedule Successfully Created");

    }

    //Student's Exam Timetable
    public function MyExamTimetable(Request $request)
    {
        $class_id = Auth::user()->class_id;
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
            $resultS = array();
            foreach($getExamTimetable as $valueS)
            {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $dataS['full_marks'] = $valueS->full_marks;
                $resultS[] = $dataS; 
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }
        $data['getRecord'] = $result;
        
        $data['header_title'] = "Personal Exam Timetable";
        return view('student.my_exam_timetable', $data);
    }     

    //Teacher's Exam Comtroller
    public function MyExamTimetableTeacher()
    {
        $result = array();
        $getClass = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach($getClass as $class)
        {
            $dataC = array();
            $dataC['class_name'] =$class->class_name;
            $getExam = ExamScheduleModel::getExam($class->class_id);
            $examArray = array();
            foreach($getExam as $exam)
            {
                $dataE = array();
                $dataE['exam_name'] =$exam->exam_name;
                $getExamTimetable = ExamScheduleModel::getExamTimetable($exam->exam_id, $class->class_id);
                $SubjectArray = array();
                foreach($getExamTimetable as $valueS)
            {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $dataS['full_marks'] = $valueS->full_marks;
                $SubjectArray[] = $dataS; 
            }
                $dataE['subject'] = $SubjectArray;
                $examArray[] = $dataE;

            }
            $dataC['exam'] = $examArray;

            $result[] =$dataC;

        }
        $data['getRecord'] = $result;
        $data['header_title'] = "Teacher Exam Timetable";
        return view('teacher.my_exam_timetable', $data);

    }
    

    //Marks Register
    public function marks_register(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        } 
        $data['header_title'] = "Marks Register";
        return view('admin.examinations.marks_register', $data);
    }


    public function submit_marks_register(Request $request)
    {   
        $validation = 0;
    if (!empty($request->mark)) 
    {
        foreach ($request->mark as $mark) 
        {
            $getExamSchedule = ExamScheduleModel::getSingle($mark['id']);
            $full_marks = $getExamSchedule->full_marks;

            $class_work = !empty($mark['class_work']) ? $mark['class_work'] : 0;
            $home_work = !empty($mark['home_work']) ? $mark['home_work'] : 0;
            $test_work = !empty($mark['test_work']) ? $mark['test_work'] : 0;
            $exam = !empty($mark['exam']) ? $mark['exam'] : 0;

            $full_marks = !empty($mark['full_marks']) ? $mark['full_marks'] : 0;
            $passing_mark = !empty($mark['passing_mark']) ? $mark['passing_mark'] : 0;

            $teacher_comments = !empty($mark['teacher_comments']) ? $mark['teacher_comments'] : ''; // Teacher's comments

            $total_mark = $class_work+$home_work+$test_work+$exam;

            if($full_marks >= $total_mark)
            {
            $getMark = MarksRegisterModel::CheckAlreadyMark(
                $request->student_id,
                $request->exam_id,
                $request->class_id,
                $mark['subject_id']);
           

            if(!empty($getMark)) 
            {
                $save = $getMark;
             
            }
            else 
            {
                // Create a new record
                $save = new MarksRegisterModel;
                $save->created_by = Auth::user()->id;
            }
                $save->student_id = $request->student_id;
                $save->exam_id = $request->exam_id;
                $save->class_id = $request->class_id;
                $save->subject_id = $mark['subject_id'];
                $save->class_work = $class_work;
                $save->home_work = $home_work;
                $save->test_work = $test_work;
                $save->full_marks = $full_marks;
                $save->passing_mark = $passing_mark;
                $save->exam = $exam;
                $save->teacher_comments = $teacher_comments; // Save teacher's comments
                $save->save();                
            }
        else
        {
            $validation = 1;
        }
    }
}
    if($validation == 0)
    {
        $json['message'] = "Marks Successfully uploaded";
    }
    else
    {
        $json['message'] = "!! Some Marks Successfully uploaded but some subjects' Marks are greater than the total Mark required and thus, unsaved !!, Ensure that the marks total is less than 100";
    }

    return response()->json($json);
}


    public function single_submit_marks_register(Request $request)
        {
            $id = $request->id;
            $getExamSchedule = ExamScheduleModel::getSingle($id);
            $full_marks = $getExamSchedule->full_marks;

            $class_work = !empty($request->class_work) ? $request->class_work : 0;
            $home_work = !empty($request->home_work) ? $request->home_work : 0;
            $test_work = !empty($request->test_work) ? $request->test_work : 0;
            $exam = !empty($request->exam) ? $request->exam : 0;
            $teacher_comments = !empty($mark['teacher_comments']) ? $mark['teacher_comments'] : ''; // Teacher's comments

            $total_mark = $class_work+$home_work+$test_work+$exam;

            if($full_marks >= $total_mark)
            {
                $getMark = MarksRegisterModel::CheckAlreadyMark(
                    $request->student_id,
                    $request->exam_id,
                    $request->class_id,
                    $request->subject_id
                );
    
                if (!empty($getMark)) 
                {
                    // Update existing marks
                    $save = $getMark;
                } else 
                {
                    $save = new MarksRegisterModel;
                    $save->created_by = Auth::user()->id;
                }
                    $save->student_id = $request->student_id;
                    $save->exam_id = $request->exam_id;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $request->subject_id;
                    $save->class_work = $class_work;
                    $save->home_work = $home_work;
                    $save->test_work = $test_work;
                    $save->exam = $exam;
                    $save->teacher_comments = $teacher_comments; // Save teacher's comments

                    $save->full_marks = $getExamSchedule->full_marks;
                    $save->passing_mark = $getExamSchedule->passing_mark;

                    $save->save();
                    
                    $json['message'] = "Marks Successfully uploaded";
            }
            else
            {
                $json['message'] = "Invalid details !! Your Total Mark is greater than the full mark";
            }
                return json_encode($json);

    }

    public function marks_register_teacher(Request $request)
    {
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['getExam'] = ExamScheduleModel::getExamTeacher(Auth::user()->id);

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        } 
        $data['header_title'] = "Marks Register";
        return view('teacher.marks_register', $data);
    }


    public function myExamResult()
    {
        $result = array();
        
        $getExam = MarksRegisterModel::getExam(Auth::user()->id);
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $dataE['exam_id'] = $value->exam_id;

            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id,Auth::user()->id);
            $dataSubject = array();
            foreach($getExamSubject as $exam)
            {
                $total_score = $exam['class_work']+$exam['test_work']+$exam['home_work']+$exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['class_work'] = $exam['class_work'];
                $dataS['test_work'] = $exam['test_work'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['exam'] = $exam['exam'];
                $dataS['total_score'] = $total_score;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS; 
            } 
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;

        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Results";
        return view('student.my_exam_result', $data);

    }




    //All Users
    public function myExamResultPrint(Request $request)
    {   
        $exam_id = $request->exam_id;
        $student_id = $request->student_id;

        $data['getExam'] = ExamModel::getSingle($exam_id);
        $data['getStudent'] = User::getSingle($student_id);

        $data['getClass'] = MarksRegisterModel::getClass($exam_id, $student_id);

        $data['getSetting'] = SettingModel::getSingle();

        $getExamSubject = MarksRegisterModel::getExamSubject($exam_id, $student_id);

        $dataSubject = array();
            foreach($getExamSubject as $exam)
            {
                $total_score = $exam['class_work']+$exam['test_work']+$exam['home_work']+$exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['class_work'] = $exam['class_work'];
                $dataS['test_work'] = $exam['test_work'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['exam'] = $exam['exam'];
                $dataS['total_score'] = $total_score;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS; 
            } 

        $data['getExamMark'] = $dataSubject;
        return view('exam_result_print', $data);

    }




    public function marks_grade()
    {
        $data['getRecord'] = MarksGradeModel::getRecord();
        $data['header_title'] = "Marks Grade Settings";
        return view('admin.examinations.marks_grade.list', $data);
    }


    public function marks_grade_add()
    {
        $data['header_title'] = "Add Marks Grade Settings";
        return view('admin.examinations.marks_grade.add', $data);
    }
       
    public function marks_grade_insert(Request $request)
    {
        $mark = new MarksGradeModel;
        $mark->name = trim($request->name);
        $mark->percent_from = trim($request->percent_from);
        $mark->percent_to = trim($request->percent_to);
        $mark->created_by = Auth::user()->id;
        $mark->save();

        return redirect('admin/examinations/marks_grade')->with('success', "Exams Mark Grade Successfully Created");

    }

    public function marks_grade_edit($id)
    {
        $data['getRecord'] = MarksGradeModel::getSingle($id);
        $data['header_title'] = "Edit Marks Grade Settings";
        return view('admin.examinations.marks_grade.edit', $data);
    }

    public function marks_grade_update($id, Request $request)
    {
        $mark = MarksGradeModel::getSingle($id);
        $mark->name = trim($request->name);
        $mark->percent_from = trim($request->percent_from);
        $mark->percent_to = trim($request->percent_to);
        $mark->save();

        return redirect('admin/examinations/marks_grade')->with('success', "Exams Mark Grade Successfully Updated");
    }


    public function marks_grade_delete($id)
    {
        $mark = MarksGradeModel::getSingle($id);
        $mark->delete();

        return redirect()->back()->with('success', "Exams Mark Grade Successfully Deleted");
 
    }

    public function ParentExamResult($student_id)
    {
        $data['getStudent'] = User::getSingle($student_id);

        $result = array();
        $getExam = MarksRegisterModel::getExam($student_id);
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['exam_id'] = $value->exam_id;
            $dataE['exam_name'] = $value->exam_name;

            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, $student_id);
            $dataSubject = array();
            foreach($getExamSubject as $exam)
            {
                $total_score = $exam['class_work']+$exam['test_work']+$exam['home_work']+$exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['class_work'] = $exam['class_work'];
                $dataS['test_work'] = $exam['test_work'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['exam'] = $exam['exam'];
                $dataS['total_score'] = $total_score;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS; 
            } 
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;

        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Results";
        return view('parent.my_exam_result', $data);

    }
    
}

 