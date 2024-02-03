<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthorsModel;
use Hash;
use Str;
use Auth;

class AuthorsController extends Controller
{
    public function list()
    {
        $data['getRecord'] = AuthorsModel::getRecord();
        $data['header_title'] = "Authors List";
        return view('librarian.authors.list', $data);
    } 

    public function add()
    {
        $data['header_title'] = "Add New Author";
        return view('librarian.authors.add', $data);
    } 
    public function insert(Request $request)
    {
        $save = new AuthorsModel;
        $save->first_name = trim($request->first_name);
        $save->last_name = trim($request->last_name);
        $save->date_of_birth = trim($request->date_of_birth);
        $save->date_of_death = trim($request->date_of_death);
        $save->nationality = trim($request->nationality);
        $save->biography = trim($request->biography);
        $save->created_by = Auth::user()->id;
        if(!empty($request->file('author_pic')))
        {
            $ext = $request->file('author_pic')->getClientOriginalExtension();
            $file = $request->file('author_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/authors/', $filename);

            $save->author_pic = $filename;
            
        }
        $save->save();

        return redirect('librarian/authors/list')->with('success', "Author Succesfully created.");
    } 


    public function edit($id, Request $request)
    {
        $data['header_title'] = "Edit Authors Data";
        $data['getRecord'] = AuthorsModel::getSingle($id);
        return view('librarian.authors.edit', $data);
    }

    public function update(Request $request)
    {
        $save = AuthorsModel::getSingle($id);
        $save->first_name = trim($request->first_name);
        $save->last_name = trim($request->last_name);
        if(!empty($request->date_of_birth))
        {
            $save->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->date_of_death))
        {
            $save->date_of_death = trim($request->date_of_death);
        }
        $save->nationality = trim($request->nationality);
        $save->biography = trim($request->biography);
        $save->created_by = Auth::user()->id;
        if(!empty($request->file('author_pic')))
        {
            $ext = $request->file('author_pic')->getClientOriginalExtension();
            $file = $request->file('author_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/authors/', $filename);

            $save->author_pic = $filename;
            
        }
        $save->save();

        return redirect('librarian/authors/list')->with('success', "Author Succesfully updated.");
    } 

    public function delete($id)
    {
        $user = AuthorsModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('librarian/authors/list')->with('success', "Author Succesfully deleted.");
    } 
}
