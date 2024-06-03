<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Master\Course;
use App\Models\Master\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::list()->get();
        return view('master.admin.courses.list-course', compact('courses'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('master.admin.courses.create-course', compact('departments'));
    }


    public function edit($id)
    {
        $course = Course::list()->where('courses.id', $id)->first();
        if (!$course) return back()->with('error', 'department not found');
        $departments = Department::all();
        return view('Master.admin.courses.create-course',
            compact('course', 'departments'));
    }

    public function store(CourseRequest $request)
    {
        $departmentarray = $request->get('course');
        if (empty($departmentarray['id'])) {//new
            $departmentarray['created_by'] = Auth::id();
            Course::query()->create($departmentarray);
        } else {//update
            $course = Course::query()->find($departmentarray['id']);
            if (!$course) redirect()->back()->with('error', 'Department not found');
            $departmentarray['updated_by'] = Auth::id();
            $course->update($departmentarray);
        }
        return redirect()->route('course.list')->with('success', 'course saved!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if (!$course) return redirect() > with('error', 'programme not found');
        $course->delete();
        return redirect()->route('course.list')->with('success', 'course deleted');
    }
}
