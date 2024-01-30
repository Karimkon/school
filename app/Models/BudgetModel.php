<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class BudgetModel extends Model
{
    use HasFactory;

    protected $table = 'budget';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public static function getRecord()
    {
        $query = self::select('budget.*', 'users.name as created_name')
            ->join('users', 'users.id', '=', 'budget.created_by');

        if (!empty(Request::get('category'))) {
            $query = $query->where('budget.category', 'like', '%' . Request::get('category') . '%');
        }

        if (!empty(Request::get('date'))) {
            $query = $query->whereDate('budget.created_at', '=', Request::get('date'));
        }

        $query = $query->where('budget.is_delete', '=', 0)
            ->orderBy('budget.id', 'desc')
            ->paginate(50);

        return $query;
    }

}
