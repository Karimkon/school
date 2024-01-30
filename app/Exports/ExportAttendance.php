<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\StudentAttendanceModel;

class ExportAttendance implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function  headings(): array
    {
        return [
            "ID",
            "Student ID",
            "Student Name",
            "Class Name",
            "Attendance Type",
            "Attendance Date",
            "Remaining Amount",
            "Payment Type",
            "Remarks",
            "Created By",
            "Created Date"
        ];
    }
    public function map($value):array{
        $student_name = $value->student_name.' '.$value->student_last_name;
        $attendance_type = '';
        if ($value->attendance_type  == 1)
        {
            $attendance_type =  'Present';
        }
        elseif ($value->attendance_type  == 2)
        {
            $attendance_type = 'Late';
        }
        elseif ($value->attendance_type  == 3)
        {
            $attendance_type = 'Absent';
        }
        elseif ($value->attendance_type  == 4)
        {
            $attendance_type = 'Half Day';
        } 
        
        
        return[
            $value->id,
            $value->student_id,
            $student_name,
            $value->class_name,
            $attendance_type,
            $value->payment_type,
            $value->remark,
            $value->created_name,
            date('d-m-Y', strtotime($value->created_at)) 

        ];
    }

    public function collection()
    {
        $remove_pagination = 1;
        return StudentAttendanceModel::getRecord($remove_pagination);
    }
}
