<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepRequest;
use App\Models\Master\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('master.admin.departments.list-department', compact('departments'));
    }

    public function create()
    {
        return view('master.admin.departments.create-department');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit($departmentid)
    {
        $department = Department::find($departmentid);
        if (!$department) return back()->with('error', 'department not found');
         return view('Master.admin.departments.create-department', compact( 'department'));
    }

    public function store(DepRequest $request)
    {
        $departmentarray = $request->get('department');
        if (empty($departmentarray['id'])) {//new
             $departmentarray['created_by'] = Auth::id();
            Department::query()->create($departmentarray);
        } else {//update
            $department = Department::find($departmentarray['id']);
            if (!$department) redirect()->back()->with('error', 'Department not found');
            $departmentarray['updated_by'] = Auth::id();
            $department->update($departmentarray);
        }
        return redirect()->route('department.list')->with('success', 'Department saved!');
    }

    public function destroy(string $id)
    {
        $user = Department::find($id);
        if (!$user) return redirect() > with('error', 'Department not found');
        $user->delete();
        return redirect()->route('department.list')->with('success', 'Department delete');
    }
}
