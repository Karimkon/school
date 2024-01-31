<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class StudentsExport implements FromCollection, ShouldAutoSize, 
    WithMapping, WithHeadings
{
    public function headings(): array
    {
        return [
            "ID",
            "Profile",
            "Student Names",
            "Parent Name",
            "Student's Email",
            "Admission Number",
            "Roll Number",
            "Class",
            "Gender",
            "Date Of Birth",
            "Tribe",
            "Blood Group",
            "Height",
            "Weight",
            "Religion",
            "Mobile Number",
            "Admission Date",
            "Created at",
            "Status"
        ];
    }

    public function map($value): array
    {
        $student_names = $value->name. ' ' . $value->last_name; 
        $parent_names = $value->name. ' ' . $value->parent_last_name; 

        return [
            $value->id,
            $value->getProfileDirect(), // Assuming this returns the profile URL
            $student_names,
            $parent_names,
            $value->email,
            $value->admission_number,
            $value->roll_number,
            $value->class,
            $value->gender,
            date('d-m-Y', strtotime($value->date_of_birth)),
            $value->caste,
            $value->blood_group,
            $value->height,
            $value->weight,
            $value->religion,
            $value->mobile_number,
            date('d-m-Y', strtotime($value->admission_date)),
            date('d-m-Y', strtotime($value->created_at)),
            $value->status == 0 ? 'Active': 'Inactive'
        ];
    }

    public function collection()
    {
        $remove_pagination = 1;
        return User::getStudent($remove_pagination);
    }
}
