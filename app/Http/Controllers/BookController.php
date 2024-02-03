<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksModel;
use App\Models\AuthorsModel;
use Hash;
use Str;
use Auth;

class BookController extends Controller
{
    public function list()
    {
        $data['getRecord'] = BooksModel::getRecord();
        $data['header_title'] = "Books List";
        return view('librarian.books.list', $data);
    } 

    public function add()
    {
        $data['header_title'] = "Add New Book";
        $data['getRecord'] = AuthorsModel::getRecord();
        return view('librarian.books.add', $data);
    } 
    public function insert(Request $request)
    {
        request()->validate([
            'isbn' => 'required|unique:books'
        ]);
        $save = new BooksModel;
        $save->title = trim($request->title);
        $save->isbn = trim($request->isbn);
        $save->author_id = trim($request->author_id);
        $save->publisher = trim($request->publisher);
        $save->publish_date = trim($request->publish_date);
        $save->genre = trim($request->genre);
        $save->description = trim($request->description);
        $save->language = trim($request->language);
        $save->total_pages = trim($request->total_pages);
        $save->quantity_in_stock = trim($request->quantity_in_stock);
        $save->price = trim($request->price);
        $save->created_by = Auth::user()->id;
        if(!empty($request->file('book_pic')))
        {
            $ext = $request->file('book_pic')->getClientOriginalExtension();
            $file = $request->file('book_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/books/', $filename);

            $save->book_pic = $filename;
            
        }
        $save->save();

        return redirect('librarian/books/list')->with('success', "Book Succesfully created.");
    } 


    public function edit($id, Request $request)
    {
        $data['header_title'] = "Edit Books Data";
        $data['getRecord'] = BooksModel::getSingle($id);
        return view('librarian.books.edit', $data);
    }

    public function update(Request $request)
    {
        request()->validate([
            'isbn' => 'required|unique:books'.$id
        ]);

        $save = BooksModel::getSingle($id);
        $save->title = trim($request->title);
        $save->isbn = trim($request->isbn);
        $save->author_id = Hash::make($request->author_id);
        $save->publisher = trim($request->publisher);
        $save->publish_date = trim($request->publish_date);
        $save->genre = trim($request->genre);
        $save->description = trim($request->description);
        $save->language = trim($request->language);
        $save->total_pages = trim($request->total_pages);
        $save->quantity_in_stock = trim($request->quantity_in_stock);
        $save->price = trim($request->price);
        $save->created_by = Auth::user()->id;
        if(!empty($request->file('book_pic')))
        {
            $ext = $request->file('book_pic')->getClientOriginalExtension();
            $file = $request->file('book_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/books/', $filename);

            $save->book_pic = $filename;
            
        }
        $save->save();

        return redirect('librarian/books/list')->with('success', "Book Succesfully updated.");
    } 
}
