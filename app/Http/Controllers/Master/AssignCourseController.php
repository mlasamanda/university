<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignCourseRequest;
 use App\Models\Master\AssignCourse;
use App\Models\Master\Course;
 use App\Models\Master\Programme;
use App\Models\Master\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignCourseController extends Controller
{
    public function assignCourse(Request $request)
    {
        $userid = $request->session()->get('userid');
        $assignCourses = AssignCourse::list()->where('ac.userid',$userid)->get();
            return view('master.admin.courses.assigncourse.assigncourse-list',
                compact('assignCourses'));
    }
    public function edit($id)
    {
        $course = AssignCourse::list()->where('ac.id', $id)->first();
        if (!$course) return back()->with('error', 'department not found');
        $programmes = Programme::all();
        $courses=Course::all();
        $semester=Semester::all();
        return view('Master.admin.courses.assigncourse.assigncourse-create',
            compact('course', 'programmes', 'courses', 'semester'));
    }

    public function create()
    {
        $courses=Course::all();
        $programmes=Programme::all();
        $semester=Semester::all();
        return view('master.admin.courses.assigncourse.assignCourse-create',compact('programmes','courses','semester'));

    }
    public function store(AssignCourseRequest $request)
    {
        $departmentarray = $request->get('course');
        if (empty($departmentarray['id'])) {//new
            $departmentarray['created_by'] = Auth::id();
            $departmentarray['userid']=$request->session()->get('userid');
            AssignCourse::query()->create($departmentarray);
        } else {//update
            $course = AssignCourse::query()->find($departmentarray['id']);
            if (!$course) redirect()->back()->with('error', 'Course not found');
            $departmentarray['updated_by'] = Auth::id();
            $course->update($departmentarray);
        }
        return redirect()->route('assign.course')->with('success', 'course saved!');
    }

}
