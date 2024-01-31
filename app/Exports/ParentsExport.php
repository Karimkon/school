<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class ParentsExport implements FromCollection, ShouldAutoSize, 
    WithMapping, WithHeadings
{
    public function headings(): array
    {
        return [
            "ID",
           "Profile Pic",
            "Parent's Name",
            "Email",
            "Gender",
            "Phone Number",
            "Occupation",
            "Address",
            "Status",
            "Created Date"
        ];
    }

    public function map($value): array
    {
        $parents_names = $value->name. ' ' . $value->last_name; 
        $students_names = $value->name. ' ' . $value->last_name; 
        return [
            $value->id,
            $value->getProfileDirect(), // Assuming this returns the profile URL
            $parents_names,
            $value->email,
            $value->gender,
            $value->phone_number,
            $value->occupation,
            $value->address,
            $value->status == 0 ? 'Active': 'Inactive',
            date('d-m-Y', strtotime($value->created_at)),

        ];
    }

    public function collection()
    {
        $remove_pagination = 1;
        return User::getParent($remove_pagination);
    }
}
