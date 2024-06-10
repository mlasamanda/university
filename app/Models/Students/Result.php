<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Result extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function scopeList()
    {
        return  DB::table('results','re')
            ->join('programmes as p','p.id','=','re.programmeid')
            ->join('courses as c','c.id','=','re.courseid')
            ->join('semesters as s','s.id','=','re.semesterid')
            ->join('course_works as cw','cw.id','=','re.courseworkid')
            ->select(['re.*','p.name as programme','c.name as course','c.code as code','s.name as semester','cw.name as coursework',
            'c.credit as credit','cw.name as coursework','s.yOfStudy as year']);



    }
}
