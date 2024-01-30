<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\StudentAddFeesModel;

use Request;

class ExportCollectFees implements FromCollection, ShouldAutoSize, 
        WithMapping, WithHeadings{

        public function  headings(): array
        {
            return [
                "ID",
                "Student ID",
                "Student Name",
                "Class Name",
                "Total Fees Amount",
                "Total Paid Amount",
                "Remaining Amount",
                "Payment Type",
                "Remarks",
                "Created By",
                "Created Date"
            ];
        }

        public function map($value):array{
            $student_name = $value->student_name_first.' '.$value->student_name_last;

            return[
                $value->id,
                $value->student_id,
                $student_name,
                $value->class_name,
                number_format($value->total_amount, 2),
                number_format($value->paid_amount, 2),
                number_format($value->remaining_amount, 2),
                $value->payment_type,
                $value->remark,
                $value->created_name,
                date('d-m-Y', strtotime($value->created_at)) 

            ];
        }

        public function collection()
        {
            $remove_pagination = 1;
            return StudentAddFeesModel::getRecord($remove_pagination);
        }
    }
