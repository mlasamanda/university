<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AssignCourse extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function scopeList()
    {
        return DB::table('assign_courses' , 'ac')
            ->join('programmes as p','p.id','=','ac.programmeid')
            ->join('courses as c','c.id','=','ac.courseid')
            ->join('users as u','u.id','=','ac.userid')
            ->join('semesters as s','s.id','=','ac.semesterid')
            ->select(['ac.*','p.name as pname','c.name as cname','c.credit as ccredit','c.code as ccode'
            ,'s.name as sename','s.yOfStudy as syofstudy'])
        ->orderBy('ac.semesterid');
    }
}
