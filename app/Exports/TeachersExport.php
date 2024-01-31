<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class TeachersExport implements FromCollection, ShouldAutoSize, 
    WithMapping, WithHeadings
{
    public function headings(): array
    {
        return [
            "ID",
            "Profile's Link",
            "Teacher's Names",
            "Teacher's Email",
            "Gender",
            "Religion",
            "DOB",
            "Blood Group",
            "Date Of Joining",
            "Mobile Number",
            "Created at",
            "Status"
        ];
    }

    public function map($value): array
    {
        $teachers_names = $value->name. ' ' . $value->last_name; 
        return [
            $value->id,
            $value->getProfileDirect(), // Assuming this returns the profile URL
            $teachers_names,
            $value->email,
            $value->gender,
            $value->religion,
            date('d-m-Y', strtotime($value->date_of_birth)),
            $value->blood_group,
            date('d-m-Y', strtotime($value->admission_date)),
            $value->mobile_number,
            date('d-m-Y', strtotime($value->created_at)),
            $value->status == 0 ? 'Active': 'Inactive'

        ];
    }

    public function collection()
    {
        $remove_pagination = 1;
        return User::getTeacher($remove_pagination);
    }
}
