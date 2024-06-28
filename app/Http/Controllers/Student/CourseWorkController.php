<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseWorkRequest;
use App\Models\Master\Course;
use App\Models\Master\Programme;
use App\Models\Master\Semester;
use App\Models\Students\CourseWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userid = $request->session()->get('userid');
        $courseworks = CourseWork::list()->where('course_works.userid',$userid)->get();
        return view('Master.admin.courses.courseworks.list-coursework', compact('courseworks'));
    }

    public function edit($id)
    {
        $course = CourseWork::list()->where('ac.id', $id)->first();
        if (!$course) return back()->with('error', 'department not found');
        $programmes = Programme::all();
        $courses = Course::all();
        $semester = Semester::all();
        return view('Master.admin.courses.courseworks.create-coursework',
            compact('course', 'programmes', 'courses', 'semester'));
    }

    public function create()
    {
        $courses = Course::all();
        $programmes = Programme::all();
        $semester = Semester::all();
        return view('Master.admin.courses.courseworks.create-coursework',
            compact('courses', 'programmes', 'courses', 'semester'));

    }

    public function store(CourseWorkRequest $request)
    {
        $departmentarray = $request->get('course');
        if (empty($departmentarray['id'])) {//new
            if($departmentarray['name']>15) {
                $departmentarray['status'] ="pass";
                $departmentarray['created_by'] = Auth::id();
                $departmentarray['userid'] =$request->session()->get('userid');
                CourseWork::query()->create($departmentarray);
            }else{
                $departmentarray['status'] ="Failed";
                $departmentarray['created_by'] = Auth::id();
                CourseWork::query()->create($departmentarray);
            }
        } else {//update
            $course = CourseWork::query()->find($departmentarray['id']);
            if (!$course) redirect()->back()->with('error', 'Course not found');
            $departmentarray['updated_by'] = Auth::id();
            $course->update($departmentarray);
        }
        return redirect()->route('coursework.list')->with('success', 'course saved!');
    }
}
