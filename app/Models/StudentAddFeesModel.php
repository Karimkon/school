<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class StudentAddFeesModel extends Model
{
    use HasFactory;
    protected $table = 'student_add_fees';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord($remove_pagination = 0)
    {
        $return = self::select('student_add_fees.*', 'class.name as class_name', 'users.name as created_name',
                 'student.name as student_name_first', 'student.last_name as student_name_last')
                ->join('class', 'class.id', '=', 'student_add_fees.class_id')
                ->join('users as student', 'student.id', '=', 'student_add_fees.student_id')
                ->join('users', 'users.id', '=', 'student_add_fees.created_by')
                ->where('student_add_fees.is_payment', '=', 1);

                if(!empty(Request::get('student_id')))
                    {
                        $return = $return->where('student_add_fees.student_id', 'like', '%'.Request::get('student_id').'%');
                    }
                    if(!empty(Request::get('student_name')))
                    {
                        $return = $return->where('student.name', 'like', '%'.Request::get('student_name').'%');
                    }
                    if(!empty(Request::get('student_last_name')))
                    {
                        $return = $return->where('student.last_name', 'like', '%'.Request::get('student_last_name').'%');
                    }
                    if(!empty(Request::get('class_id')))
                    {
                        $return = $return->where('student_add_fees.class_id', '=', Request::get('class_id'));
                    }

                    if(!empty(Request::get('start_created_date')))
                    {
                        $return = $return->whereDate('student_add_fees.created_at', '>=', Request::get('start_created_date'));
                    }
                    if(!empty(Request::get('end_created_date')))
                    {
                        $return = $return->whereDate('student_add_fees.created_at', '<=', Request::get('start_created_date'));
                    }

                    if(!empty(Request::get('payment_type')))
                    {
                        $return = $return->where('student_add_fees.payment_type', '=', Request::get('payment_type'));
                    }

                $return=$return->orderBy('student_add_fees.id', 'desc');
                if(!empty($remove_pagination))
                {
                    $return=$return->get();
                }
                else
                {
                    $return=$return->paginate(50);
                }
                return $return;
    }

    static public function getFees($student_id)
    {
        return self::select('student_add_fees.*', 'class.name as class_name', 'users.name as created_name')
                ->join('class', 'class.id', '=', 'student_add_fees.class_id')
                ->join('users', 'users.id', '=', 'student_add_fees.created_by')
                ->where('student_add_fees.student_id', '=', $student_id)
                ->where('student_add_fees.is_payment', '=', 1)
                ->get();
    }


    static public function getPaidAmount($student_id, $class_id)
    {
        return self::where('student_add_fees.class_id', '=', $class_id)
                ->where('student_add_fees.student_id', '=', $student_id)
                ->where('student_add_fees.is_payment', '=', 1)
                ->sum('student_add_fees.paid_amount');
    }

    static public function getTotalTodayFees()
    {
        return self::where('student_add_fees.is_payment', '=', 1)
                    ->whereDate('student_add_fees.created_at', '=', date('Y-m-d'))
                    ->sum('student_add_fees.paid_amount');
    }


    static public function getTotalFees()
    {
        return self::where('student_add_fees.is_payment', '=', 1)
                    ->sum('student_add_fees.paid_amount');
    }

    static public function TotalPaidAmountStudent($student_id)
    {
        return self::where('student_add_fees.is_payment', '=', 1)
                    ->where('student_add_fees.student_id', '=', $student_id)
                    ->sum('student_add_fees.paid_amount');
    }
}
