<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeList()
    {
        return DB::table('courses')
            ->join('departments', 'courses.departmentid', '=', 'departments.id')
            //->join('semesters', 'courses.semester_id', '=', 'semesters.id')
            //->join('programme_courses', 'courses.id', '=', 'programme_courses.course_id')
            ->select(['courses.*', 'departments.name as dname']);

    }
}
