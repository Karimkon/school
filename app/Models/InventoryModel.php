<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InventoryModel extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord(Request $request)
    {
        $query = self::select('inventory.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'inventory.created_by')
            ->where('inventory.is_delete', '=', 0);
    
        if ($request->has('year')) {
            // Filter by year if provided in the request
            $query->whereYear('inventory.created_at', $request->year);
        }
    
        return $query;
    }
    

    public function getInventoryItemPic()
    {
        if (!empty($this->item_image) && file_exists('upload/inventory/' . $this->item_image)) {
            return url('upload/inventory/' . $this->item_image);
        } else {
            return '';
        }
    }

   
}