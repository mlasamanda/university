<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class Result extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function scopeList()
    {
        return DB::table('results', 're')
            ->join('programmes as p', 'p.id', '=', 're.programmeid')
            ->join('courses as c', 'c.id', '=', 're.courseid')
            ->join('semesters as s', 's.id', '=', 're.semesterid')
            ->join('course_works as cw', 'cw.id', '=', 're.courseworkid')
            ->join('users as u', 'u.id', '=', 're.userid')
            ->select(['re.*', 'p.name as programme', 'c.name as course', 'c.code as code', 's.name as semester', 'cw.name as coursework',
                'c.credit as credit', 'cw.name as coursework', 's.yOfStudy as year','u.fname as fullname','u.regno as regno'])
            ->selectRaw("(cw.name+mark) as total")
            ->selectRaw("(cw.name+mark)*credit as total_grade")
            //->selectRaw("sum((cw.name+mark)*credit) as total_grade_mark")
            //->selectRaw("(sum((cw.name+mark)*credit)/sum(credit)) as gpa")
            ->orderBy('total');


    }
}
