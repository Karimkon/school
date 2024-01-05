<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SettingModel;
use Auth;
use Hash;
use Str;

class UserController extends Controller
{
    public function UpdateSetting(Request $request)
    {
        $setting = SettingModel::getSingle();
        $setting->paypal_email = trim($request->paypal_email);
        $setting->stripe_key = trim($request->stripe_key);
        $setting->stripe_secret = trim($request->stripe_secret);
        $setting->school_name = trim($request->school_name);
        $setting->exam_description = trim($request->exam_description);

        if(!empty($request->file('logo')))
        {
            $ext = $request->file('logo')->getClientOriginalExtension();
            $file = $request->file('logo');
            $randomStr = date('Ymdhis').Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $setting->logo = $filename;
            
        }

        if(!empty($request->file('fevicon_icon')))
        {
            $ext = $request->file('fevicon_icon')->getClientOriginalExtension();
            $file = $request->file('fevicon_icon');
            $randomStr = date('Ymdhis').Str::random(10);
            $fevicon_icon = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $fevicon_icon);

            $setting->fevicon_icon = $fevicon_icon;
            
        }

        if(!empty($request->file('login_image')))
        {
            $ext = $request->file('login_image')->getClientOriginalExtension();
            $file = $request->file('login_image');
            $randomStr = date('Ymdhis').Str::random(10);
            $login_image = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $login_image);

            $setting->login_image = $login_image;
            
        }
       
        $setting->save();
        return redirect()->back()->with('success', "Account Succesfully Updated.");
    }

    public function Setting()
    {
        $data['getRecord'] = SettingModel::getSingle();
        $data['header_title'] = "Settings";
        return view('admin.setting', $data);
    }

    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 1)
        {
            return view('admin.my_account', $data);
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('teacher.my_account', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
           return view('student.my_account', $data);
  
        }
        else if(Auth::user()->user_type == 4)
        {
           return view('bursar.my_account', $data);
  
        }
       
        else if(Auth::user()->user_type == 5)
        {
            return view('parent.my_account', $data);
        }
    }

    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;
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
        $teacher->email = trim($request->email);
        if(!empty($request->password))
        {
            $teacher->password = Hash::make($request->password);
        }
        $teacher->save();

        return redirect()->back()->with('success', "Account Succesfully Updated.");
    }

    public function UpdateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
    
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
    
        $admin = User::find($id); // Retrieve the admin user based on their ID
    
        if (!$admin) {
            // Handle the case where the admin user is not found
            // You can return an error response or redirect to an error page
        }
    
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);
        $admin->save();
    
        return redirect()->back()->with('success', "Admin Successfully updated.");
    }
    


    public function UpdateMyaccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'religion' => 'max:50',
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);

        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('upload/profile/'.$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
            
        }
       
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->save();

        return redirect()->back()->with('success', "Account Succesfully Updated.");

    }


    public function UpdateMyaccountParent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'occupation' => 'max:50',
        ]);

        $parent = User::getSingle($id);

        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);

        if(!empty($request->date_of_birth))
        {
            $parent->date_of_birth = trim($request->date_of_birth);
        }

        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->religion = trim($request->religion);
        $parent->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($parent->getProfile()))
            {
                unlink('upload/profile/'.$parent->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
            
        }
       
        $parent->blood_group = trim($request->blood_group);
        $parent->height = trim($request->height);
        $parent->weight = trim($request->weight);
        $parent->email = trim($request->email);
        $parent->save();

        return redirect()->back()->with('success', "Account Succesfully Updated.");

    }

    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    
    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Password Updated Successfully");
        }
        else
        {
            return redirect()->back()->with('error', "Old Password Incorrect !!");
        }
    }
    

    
}
