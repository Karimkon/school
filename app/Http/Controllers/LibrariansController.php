<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;

class LibrariansController extends Controller
{
        public function list()
        {
            $data['getRecord'] = User::getLibrarian();
            $data['header_title'] = "Librarians List";
            return view('admin.librarian.list', $data);
        } 
        public function add()
        {
            $data['header_title'] = "Add New Admin";
            return view('admin.librarian.add', $data);
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
            $user->user_type = 6;
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
    
            return redirect('admin/librarian/list')->with('success', "librarian Succesfully created.");
        } 
        public function edit($id)
        {
            $data['getRecord'] = User::getSingle($id);
            if(!empty($data['getRecord']))
            {
                $data['header_title'] = "Edit Selected Admin";
                return view('admin.librarian.edit', $data);
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
            
            $user->user_type = 6;
            $user->save();
    
            return redirect('admin/librarian/list')->with('success', "librarian Succesfully updated.");
        } 
    
        public function delete($id)
        {
            $user = User::getSingle($id);
            $user->is_delete = 6;
            $user->save();
    
            return redirect('admin/librarian/list')->with('success', "librarian Succesfully deleted.");
        } 
    }
    
