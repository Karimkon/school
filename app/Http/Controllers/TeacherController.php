<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teachers List";
        return view('admin.teacher.list', $data);
    } 

    public function add()
    {
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.add', $data);
    }


    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
        ]);
        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->email = trim($request->email);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        $teacher->religion = trim($request->religion);
        $teacher->mobile_number = trim($request->mobile_number);

        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        $teacher->blood_group = trim($request->blood_group);
        if(!empty($request->admission_date))
        {
            $teacher->admission_date = trim($request->admission_date);
        }
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
            
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 3;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "New Teacher Succesfully created.");
    } 
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Teacher";
            return view('admin.teacher.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    }
    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15|min:8',
            'religion' => 'max:50',
        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        $teacher->blood_group = trim($request->blood_group);
        $teacher->religion = trim($request->religion);
        $teacher->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($teacher->getProfile()))
            {
                unlink('upload/profile/'.$teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
            
        }

        if(!empty($request->admission_date))
        {
            $teacher->admission_date = trim($request->admission_date);
        }
        
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        if(!empty($request->password))
        {
            $teacher->password = Hash::make($request->password);
        }
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "teacher Succesfully Updated.");
    }
    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', "teacher Deleted Succesfully.");
        }
        else
        {
            abort(404);
        }
        
    }
   
}
