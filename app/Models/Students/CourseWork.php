<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CourseWork extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function  ScopeList()
    {
        return DB::table('course_works')
            ->join('courses', 'courses.id', '=', 'course_works.courseid')
            ->join('semesters', 'semesters.id', '=', 'course_works.semesterid')
            ->join('programmes', 'programmes.id', '=', 'course_works.programmeid')
            ->select(['course_works.*', 'programmes.name as programme', 'semesters.name as semester', 'courses.name as ncourse',
                'courses.code as ccode','courses.credit as ccredit']);

    }
}
