<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class BooksModel extends Model
{
    use HasFactory;
    protected $table = 'books';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord()
    {
        $query = self::select('books.*', 'users.name as created_name', 'authors.first_name as first_name', 'authors.last_name as last_name')
            ->join('users', 'users.id', '=', 'books.created_by')
            ->join('authors', 'authors.id', '=', 'books.author_id');

        if (!empty(Request::get('category'))) {
            $query = $query->where('books.category', 'like', '%' . Request::get('category') . '%');
        }

        if (!empty(Request::get('date'))) {
            $query = $query->whereDate('books.created_at', '=', Request::get('date'));
        }

        $query = $query->where('books.is_delete', '=', 0)
            ->orderBy('books.id', 'desc')
            ->paginate(50);

        return $query;
    }

    public function getProfileDirect()
    {
        if(!empty($this->book_pic) && file_exists('upload/books/'.$this->book_pic))
        {
            return url('upload/books/'.$this->book_pic);
        }
        else
        {
            return url('upload/books/user.png');
        }
    }
}
