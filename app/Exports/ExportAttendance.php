<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\StudentAttendanceModel;

class ExportAttendance implements FromCollection, ShouldAutoSize, 
    WithMapping, WithHeadings
{
    public function headings(): array
    {
        return [
            "ID",
            "Student ID",
            "Student Name",
            "Class Name",
            "Attendance Type",
            "Attendance Date",
            "Created By",
            "Created Date"
        ];
    }

    public function map($value): array
    {
        $student_name = $value->student_name . ' ' . $value->student_last_name;
        $attendance_type = '';

        switch ($value->attendance_type) {
            case 1:
                $attendance_type = 'Present';
                break;
            case 2:
                $attendance_type = 'Late';
                break;
            case 3:
                $attendance_type = 'Absent';
                break;
            case 4:
                $attendance_type = 'Half Day';
                break;
        }

        return [
            $value->id,
            $value->student_id,
            $student_name,
            $value->class_name,
            $attendance_type,
            date('d-m-Y', strtotime($value->attendance_date)),
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
