<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class AuthorsModel extends Model
{
    use HasFactory;
    protected $table = 'authors';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord()
    {
        $query = self::select('authors.*', 'users.name as created_name')
            ->join('users', 'users.id', '=', 'authors.created_by');

        if (!empty(Request::get('category'))) {
            $query = $query->where('authors.category', 'like', '%' . Request::get('category') . '%');
        }

        if (!empty(Request::get('date'))) {
            $query = $query->whereDate('authors.created_at', '=', Request::get('date'));
        }

        $query = $query->where('authors.is_delete', '=', 0)
            ->orderBy('authors.id', 'desc')
            ->paginate(50);

        return $query;
    }

    public function getProfileDirect()
    {
        if(!empty($this->author_pic) && file_exists('upload/authors/'.$this->author_pic))
        {
            return url('upload/authors/'.$this->author_pic);
        }
        else
        {
            return url('upload/authors/user.png');
        }
    }
}
