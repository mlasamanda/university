<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Programme extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function scopeList()
    {
 return DB::table('programmes')
 ->join('departments', 'programmes.departmentid', '=', 'departments.id')
     //->join('programme_courses', 'programme_courses.programme_id', '=', 'programmes.id')
 ->select(['programmes.*', 'departments.name as dname']);
    }
}
