<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseWorkRequest;
use App\Http\Requests\ResultRequest;
use App\Models\Master\Course;
use App\Models\Master\Programme;
use App\Models\Master\Semester;
use App\Models\Students\CourseWork;
use App\Models\Students\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::list()->get();
        return view('Master.results.result-list', compact('results'));
    }


    public function edit($id)
    {
        $course = Result::list()->where('re.id', $id)->first();
        if (!$course) return back()->with('error', 'results not found');
        $programmes = Programme::all();
        $courses = Course::all();
        $semester = Semester::all();
        $courseworks = CourseWork::all();
        return view('Master.results.result-create',
            compact('course', 'programmes', 'courses', 'semester','courseworks'));
    }

    public function create()
    {
        $courses = Course::all();
        $programmes = Programme::all();
        $semester = Semester::all();
        $coursework=CourseWork::all();
        return view('Master.results.result-create',
            compact('courses', 'programmes', 'courses', 'semester','coursework'));

    }

    public function store( ResultRequest $request)
    {
        $departmentarray = $request->get('course');
        if (empty($departmentarray['id'])) {//new
                $departmentarray['created_by'] = Auth::id();
                Result::query()->create($departmentarray);
        } else {//update
            $course = Result::query()->find($departmentarray['id']);
            if (!$course) redirect()->back()->with('error', 'Result not found');
            $departmentarray['updated_by'] = Auth::id();
            $course->update($departmentarray);
        }
        return redirect()->route('result.list')->with('success', 'result saved!');
 }
}
