<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use App\Models\User;
use App\Models\ClassSubjectTimetableModel;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Auth;

class ClassTimetableController extends Controller
{
    public function list(Request $request)
{
    $data['getClass'] = ClassModel::getClass();

    if (!empty($request->class_id)) {
        $data['getSubject'] = ClassSubjectModel::MySubject($request->class_id);
    }

    $getWeek = WeekModel::getRecord();
    $week = array();

    foreach ($getWeek as $value) {
        $dataW = array();
        $dataW['week_id'] = $value->id;
        $dataW['week_name'] = $value->name;

        if (!empty($request->class_id) && !empty($request->subject_id)) {
            $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($request->class_id, $request->subject_id, $value->id);

            if (!empty($ClassSubject)) {
                $dataW['start_time'] = $ClassSubject->start_time;
                $dataW['end_time'] = $ClassSubject->end_time;
                $dataW['room_number'] = $ClassSubject->room_number;
            } else {
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }
        } else {
            $dataW['start_time'] = '';
            $dataW['end_time'] = '';
            $dataW['room_number'] = '';
        }

        $week[] = $dataW;
    }
    $data['week'] = $week;
    $data['header_title'] = "Class Timetable ";

    return view('admin.class_timetable.list', $data);
}

    
    public function get_subject(Request $request)
{
    try {
        // Attempt to retrieve subjects based on the class ID
        $getSubject = ClassSubjectModel::MySubject($request->class_id);

        $html = "<option value=''>select</option>";

        foreach ($getSubject as $value) {
            $html .= "<option value='" . $value->subject_id . "'>" . $value->subject_name . "</option>";
        }

        // Log a success message
        Log::info('Subjects retrieved successfully.');

        return response()->json(['html' => $html]);
    } catch (\Exception $e) {
        // Log an error message and return an error response
        Log::error('Error while retrieving subjects: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred while retrieving subjects.']);
    }
}

    public function insert_update(Request $request)
    {
        ClassSubjectTimetableModel::where('class_id', '=', $request->class_id)->where('subject_id', '=', $request->subject_id)
        ->delete();
        foreach($request->timetable as $timetable)
        {
            if(!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time'])
            && !empty($timetable['room_number']))
        {
            $save = new ClassSubjectTimetableModel;
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->week_id = $timetable['week_id'];
            $save->start_time = $timetable['start_time'];
            $save->end_time = $timetable['end_time'];
            $save->room_number = $timetable['room_number'];
            $save->subject_id = $request->subject_id;
            $save->save();;
        }
        }
        return redirect()->back()->with('success', "Class Time Table Assigned Successfully");
    }

    //Student's side
    public function MyTimetable()
    {
        $result = array();;
        $getRecord = ClassSubjectModel::MySubject(Auth::user()->class_id);
        foreach($getRecord as $value)
        {
            $dataS['name'] = $value->subject_name;
            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach($getWeek as $valueW)
            {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);

                if (!empty($ClassSubject)) {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }

                $week[] = $dataW;

            }
            $dataS['week'] = $week;
            $result[] = $dataS; 
        }
        $data['getRecord'] = $result;

        $data['header_title'] = "My Class Timetable";
        return view('student.my_timetable', $data);
    }

    public function MyTimetableTeacher($class_id, $subject_id)
    {       
            $data['getClass'] = ClassModel::getSingle($class_id);
            $data['getSubject'] = SubjectModel::getSingle($subject_id);
            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach($getWeek as $valueW)
            {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $valueW->id);

                if (!empty($ClassSubject)) {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }

                $result[] = $dataW;

            }
        $data['getRecord'] = $result;

        $data['header_title'] = "My Class Timetable";
        return view('teacher.my_timetable', $data);
       
    }

    //Parent Side
    public function MyTimetableParent($class_id, $subject_id, $student_id)
    {       
            $data['getClass'] = ClassModel::getSingle($class_id);
            $data['getSubject'] = SubjectModel::getSingle($subject_id);
            $data['getStudent'] = User::getSingle($student_id);

            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach($getWeek as $valueW)
            {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $valueW->id);

                if (!empty($ClassSubject)) {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }

                $result[] = $dataW;

            }
        $data['getRecord'] = $result;

        $data['header_title'] = "My Class Timetable";
        return view('parent.my_timetable', $data);
    }
       
}
