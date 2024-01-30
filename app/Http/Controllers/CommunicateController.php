<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NoticeBoardModel;
use App\Models\NoticeBoardMessageModel;
use App\Mail\SendEmailUserMail;
use Mail;
use Auth;

class CommunicateController extends Controller
{
    public function SendEmail()
    {
        $data['header_title'] = 'Send  Emails';
        return view('admin.communicate.send_email', $data);  
    }

    public function SendEmailBursar()
    {
        $data['header_title'] = 'Bursar Send  Emails';
        return view('bursar.communicate.send_email', $data);  
    }

    public function SearchUser(Request $request)
    {
        $json = array();
        if(!empty($request->search))
        {
            $getUser = User::searchUser($request->search);
            foreach ($getUser as $value)
            {
                $type  = '';
                if($value->user_type == 2)
                {
                    $type = "Student";
                }
                
                else if($value->user_type == 3)
                {
                    $type = "Teacher";
                }
                
                else if($value->user_type == 1)
                {
                    $type = "Admin";
                }

                else if($value->user_type == 4)
                {
                    $type = "Bursar";
                }
                
                else if($value->user_type == 5)
                {
                    $type = "Parent";
                }
                $name = $value->name.' '.$value->last_name.' 👉 '.$type;
                $json[] = ['id'=>$value->id, 'text'=>$name];
            }

        }
        echo json_encode($json);
    }
    public function SendEmailUser(Request $request)
    {
        if(!empty($request->user_id))
        {
            $user = User::getSingle($request->user_id);
            $user->send_message = $request->message;
            $user->send_subject = $request->subject;
            Mail::to($user->email)->send(new SendEmailUserMail($user));
        }
            return redirect()->back()->with('success', "Mail Successfully sent ");

    }
    public function NoticeBoard()
    {
        $data['getRecord'] = NoticeBoardModel::getRecord();
        $data['header_title'] = 'Notice board';
        return view('admin.communicate.notice_board.list', $data);            
    }

    public function SMS()
    {
        $data['getRecord'] = NoticeBoardModel::getRecord();
        $data['header_title'] = 'SMS Centre';
        return view('bursar.communicate.sms.list', $data);            
    }

    public function AddNoticeBoard()
    {
        $data['header_title'] = 'Add New Notice';
        return view('admin.communicate.notice_board.add', $data);            
    }

    public function findSMSPage()
    {
        $data['header_title'] = 'Add New Notice';
        return view('bursar.communicate.sms.add', $data);            
    }
    
    public function InsertNoticeBoard(Request $request)
    {
        $save = new NoticeBoardModel; 
        $save->title = $request->title;
        $save->notice_date = $request->notice_date;
        $save->publish_date = $request->publish_date;
        $save->message = $request->message;
        $save->created_by = Auth::user()->id;
        $save->save();

        if(!empty($request->message_to))
        {
            foreach($request->message_to as $message_to)
            {
                $message = new NoticeBoardMessageModel;
                $message->notice_board_id = $save->id;
                $message->message_to = $message_to;
                $message->save();
            }

        }
        return redirect('admin/communicate/notice_board')->with("success", 'Notice Board Message succesfully created');

    }

    public function SendSMS(Request $request)
    {
        $save = new NoticeBoardModel; 
        $save->title = $request->title;
        $save->notice_date = $request->notice_date;
        $save->publish_date = $request->publish_date;
        $save->message = $request->message;
        $save->created_by = Auth::user()->id;
        $save->save();

        if(!empty($request->message_to))
        {
            foreach($request->message_to as $message_to)
            {
                $message = new NoticeBoardMessageModel;
                $message->notice_board_id = $save->id;
                $message->message_to = $message_to;
                $message->save();
            }

        }
        return redirect('bursar/communicate/sms')->with("success", 'SMS succesfully sent');

    }

    public function EditNoticeBoard($id)
    {
        $data['getRecord'] = NoticeBoardModel::getSingle($id);
        $data['header_title'] = 'Edit Notice board';
        return view('admin.communicate.notice_board.edit', $data);  

    }

    public function UpdateNoticeBoard($id, Request $request)
    {
        
        $save = NoticeBoardModel::getSingle($id); 
        $save->title = $request->title;
        $save->notice_date = $request->notice_date;
        $save->publish_date = $request->publish_date;
        $save->message = $request->message;
        $save->save();

        NoticeBoardMessageModel::DeleteRecord($id);
        if(!empty($request->message_to))
        {
            foreach($request->message_to as $message_to)
            {
                $message = new NoticeBoardMessageModel;
                $message->notice_board_id = $save->id;
                $message->message_to = $message_to;
                $message->save();
            }

        }
        return redirect('admin/communicate/notice_board')->with("success", 'Notice Board Message succesfully Updated');

    }

    public function DeleteNoticeBoard($id)
    {
        $save =  NoticeBoardModel::getSingle($id);
        $save->delete();
        NoticeBoardMessageModel::DeleteRecord($id); 
        return redirect()->back()->with("success", 'Notice Board Message succesfully Deleted');

    }

    public function MyNoticeBoardStudent()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = 'My Notice board';
        return view('student.my_notice_board', $data); 

    }

    //Teachers Notice Board
    public function MyNoticeBoardTeacher()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = 'My Notice board';
        return view('teacher.my_notice_board', $data); 

    }
    
    //Parent Notice Board
    public function MyNoticeBoardParent()
    {
        $data['getRecord'] = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $data['header_title'] = 'My Notice board';
        return view('parent.my_notice_board', $data); 

    }
}
