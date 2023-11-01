<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;
class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Class";
        return view('admin.class.add', $data);
    }
    public function insert(Request $request)
    {
        $save = new ClassModel;
        $save->name = $request->name;
        $save->amount = $request->amount;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('admin/class/list')->with('success', "Class Succesfully created.");
}


    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Class";
            return view('admin.class.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    } 
    public function update($id, Request $request)
    {
       
        $save = ClassModel::getSingle($id);
        $save->name = $request->name;
        $save->amount = $request->amount;
        $save->status = $request->status;
        
        $save->save();

        return redirect('admin/class/list')->with('success', "Class Succesfully updated.");
    } 

    public function delete($id)
    {
        $user = ClassModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('success', "Class Succesfully deleted.");
    } 
}