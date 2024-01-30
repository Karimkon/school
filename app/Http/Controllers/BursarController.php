<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;

class BursarController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getBursar();
        $data['header_title'] = "bursars List";
        return view('admin.bursar.list', $data);
    } 
    public function add()
    {
        $data['header_title'] = "Add New bursar";
        return view('admin.bursar.add', $data);
    } 
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 4;
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
            
        }
        $user->save();

        return redirect('admin/bursar/list')->with('success', "bursar Succesfully created.");
    } 
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Selected bursar";
            return view('admin.bursar.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    } 
    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($user->getProfile()))
            {
                unlink('upload/profile/'.$user->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
            
        }
        
        $user->user_type = 4;
        $user->save();

        return redirect('admin/bursar/list')->with('success', "bursar Succesfully updated.");
    } 

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/bursar/list')->with('success', "bursar Succesfully deleted.");
    } 

}
