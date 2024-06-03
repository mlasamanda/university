<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepRequest;
use App\Http\Requests\ProgrammeRequest;
use App\Models\Master\Department;
use App\Models\Master\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programmes = Programme::list()->get();
        return view('master.admin.programmes.list-programme', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('master.admin.programmes.create-programme', compact('departments'));
    }


    public function edit($id)
    {
        $programme = Programme::list()->where('programmes.id', $id)->first();
        if (!$programme) return back()->with('error', 'department not found');
        $departments = Department::all();
        return view('Master.admin.programmes.create-programme',
            compact('programme', 'departments'));
    }

    public function store(ProgrammeRequest $request)
    {
        $departmentarray = $request->get('programme');
        if (empty($departmentarray['id'])) {//new
            $departmentarray['created_by'] = Auth::id();
            Programme::query()->create($departmentarray);
        } else {//update
            $programme = Programme::query()->find($departmentarray['id']);
            if (!$programme) redirect()->back()->with('error', 'Department not found');
            $departmentarray['updated_by'] = Auth::id();
            $programme->update($departmentarray);
        }
        return redirect()->route('programme.list')->with('success', 'Programme saved!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programme=Programme::find($id);
        if(!$programme) return redirect()>with('error','programme not found');
        $programme->delete();
        return redirect()->route('programme.list')->with('success','programme delete');
    }
}
