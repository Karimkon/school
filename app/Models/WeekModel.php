<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekModel extends Model
{
    use HasFactory;
    protected $table = 'week';

    static function getRecord()
    {
        return self::get();
    }

    static function getWeekUsingName($weekname)
    {
        return self::where('name', '=', $weekname)->first();
    }
}
