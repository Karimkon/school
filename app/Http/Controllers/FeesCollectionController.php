<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\StudentAddFeesModel;
use App\Models\User;
use App\Models\SettingModel;
use Excel;
use App\Exports\ExportCollectFees;
use Stripe\Stripe;
use Session;    
use Auth;

class FeesCollectionController extends Controller
{
    public function collect_fees(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->all()))
        {
            $data['getRecord'] = User::getCollectFeesStudent();
        }
        $data['header_title'] = "Collect Fees List";
        return view('admin.fees_collection.collect_fees', $data);
    }

    public function collect_fees_bursar(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->all()))
        {
            $data['getRecord'] = User::getCollectFeesStudent();
        }
        $data['header_title'] = "Collect Fees List";
        return view('bursar.fees_collection.collect_fees', $data);
    }
    

    public function collect_fees_report()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getRecord'] = StudentAddFeesModel::getRecord();
        $data['header_title'] = "Collect Fees Report";
        return view('admin.fees_collection.collect_fees_report', $data);
    }

    public function collect_fees_add($student_id)
    {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id); 
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add Fees Collection";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('admin.fees_collection.add_collect_fees', $data);

    }

    //ursar side
    public function collect_fees_add_bursar($student_id)
    {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id); 
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add Fees Collection";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('bursar.fees_collection.add_collect_fees', $data);

    }

    public function collect_fees_insert($student_id, Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:0',
            'payment_type' => 'required',
            'remark' => 'nullable|string',
        ]);
        
        $getStudent = User::getSingleClass($student_id);
        $paid_amount = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        if(!empty($request->amount))
        {
            $RemainingAmount = $getStudent->amount - $paid_amount; 
        if($RemainingAmount >= $request->amount)
        {
            $remaining_amount_user = $RemainingAmount - $request->amount;
        $payment = new StudentAddFeesModel;
        $payment->student_id = $student_id;
        $payment->class_id = $getStudent->class_id;
        $payment->paid_amount = $request->amount;
        $payment->total_amount = $RemainingAmount;
        $payment->remaining_amount = $remaining_amount_user;
        $payment->payment_type = $request->payment_type;
        $payment->remark = $request->remark;
        $payment->created_by = Auth::user()->id;
        $payment->is_payment = 1;
        $payment->save();

        return redirect()->back()->with('success', "Fees Payment Successfully Added");
        }
        else
        {
            return redirect()->back()->with('error', "The Entered Fees Payment Amount was greater than the Remaining Amount !!, Try again with a lesser amount ");

        }

        }
        else
        {
            return redirect()->back()->with('error', "Please add some amount, Add and try again");
        }
        
    }

    // Student Side Fees Logic
    public function CollectFeesStudent(Request $request)
    {
        $student_id = Auth::user()->id;

        $data['getFees'] = StudentAddFeesModel::getFees($student_id); 
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add My School Fees ";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('student.my_fees_collection', $data);

    }

    // Parent Side Fees Logic
    public function CollectFeesStudentParent($student_id, Request $request)
    {
        $getStudent = User::getSingle($student_id);
        $data['getStudent'] = $getStudent;
        $data['getFees'] = StudentAddFeesModel::getFees($student_id); 
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add My School Fees ";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('parent.my_fees_collection', $data);

    }


    public function CollectFeesStudentPayment(Request $request)
    {
        $getStudent = User::getSingleClass(Auth::user()->id);
        $paid_amount = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);
        if(!empty($request->amount))
        {
            $RemainingAmount = $getStudent->amount - $paid_amount; 
            if($RemainingAmount >= $request->amount)
            {
                $RemainingAmount = $getStudent->amount - $paid_amount; 
                if($RemainingAmount >= $request->amount)
                {
                    $remaining_amount_user = $RemainingAmount - $request->amount;
                        $payment = new StudentAddFeesModel;
                        $payment->student_id = Auth::user()->id;
                        $payment->class_id = Auth::user()->class_id;
                        $payment->paid_amount = $request->amount;
                        $payment->total_amount = $RemainingAmount;
                        $payment->remaining_amount = $remaining_amount_user;
                        $payment->payment_type = $request->payment_type;
                        $payment->remark = $request->remark;
                        $payment->created_by = Auth::user()->id;
                        $payment->save();

                        $getSetting = SettingModel::getSingle();
                if($request->payment_type == 'Paypal')
                    {
                        $query = array();
                        $query['business']       =  $getSetting->paypal_email;
                        $query['cmd']            =  '_xclick';
                        $query['item_name']       =  'Student fees';
                        $query['no_shipping']     =  '1';
                        $query['amount']       =  $request->amount;
                        $query['currency_code']       =  'USD';
                        $query['cancel_return']       =  url('student/paypal/payment-error');
                        $query['return']       =  url('student/paypal/payment-success');

                        $query_string = http_build_query($query);

                        header('Location: https::www.sandbox.paypal.com/cgi-bin/webscr?'. $query_string);
                        exit();

                    }
                
                else if($request->payment_type == 'Stripe')
                    {
                        $setPublicKey = $getSetting->stripe_key;
                        $setApiKey = $getSetting->stripe_secret;

                        Stripe::setApiKey($setApiKey);
                        $finalprice = $request->amount * 100;

                        $session = \Stripe\Checkout\Session::create([
                            'customer_email' => Auth::user()->email,
                            'payment_method_types' => ['card'],
                            'line_items' => [[
                                'name' => 'Student Fees',
                                'description' => 'You are paying Student fees',
                                'images' => [url('')],
                                'amount' => intval($finalprice), // Use 'amount' instead of 'price'
                                'currency' => 'usd',
                                'quantity' => 1,
                            ]],
                            'success_url' => url('student/payment-success'),
                            'cancel_url' => url('student/payment-error'),
                        ]);
                        
                            $payment->stripe_session_id = $session['id'];
                            $payment->save();

                        $data['session_id'] = $session['id'];
                        Session::put('stripe_session_id', $session['id']);
                        $data['setPublicKey'] = $setPublicKey;

                        return view('stripe_charge', $data);
                        
                    }
                   // return redirect()->back()->with('success', "Fees Payment Successfully Added");
            }
            else
            {
                return redirect()->back()->with('error', "The Entered Fees Payment Amount was greater than the Remaining Amount !!, Try again with a lesser amount ");
            }
        }
        else
        {
            return redirect()->back()->with('error', "Please add an amount, Add and try again");

        }
    }
}

    public function PaymentSuccessStripe(Request $request)
    {

    }
    public function PaymentError()
    {
        return redirect('student/fees_collection')->with('error', "Payment Failed");
    }

    public function PaymentSuccess(Request $request)
    {
        if(!empty($request->item_number) && !empty($request->st) && $request->st == 'Completed')
        {
            $fees = StudentAddFeesModel::getSingle($request->item_number);
            if(!empty($fees))
            {
                $fees->is_payment = 1;
                $fees->payment_data = json_encode($request->all());
                $fees->save();
                return redirect('student/fees_collection')->with('sucees', "You Successfully paid Tuition");
            }
            else
            {
                return redirect('student/fees_collection')->with('error', "Try Again");
            }
        }
        else
        {
            return redirect('student/fees_collection')->with('error', "Try Again");
        }
    }

    public function export_collect_fees_report(Request $request)
    {
    return Excel::download(new ExportCollectFees, 'FeesCollectionReport_'.date('d-m-Y').'.xlsx');
    }

}