<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Result extends Model
{
    use HasFactory;
    public function scopeList()
    {
        return  DB::table('result','re')
            ->join('programmes as p','p.id','=','re.programmeid')
            ->join('courses as c','c.id','=','p.courseid')
            ->join('semesters as s','s.id','=','c.semesterid')
            ->join('courseworks as cw','cw.id','=','c.courseworkid')
            ->select(['re.*','p.name as programme','c.name as course','s.name as semester','cw.name as coursework',
            'c.credit as credit']);


    }
}
