<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Master\Department;
use App\Models\Master\Menu;
use App\Models\Master\Permission;
use App\Models\Master\Programme;
use App\Models\Master\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::list()->get();
        return view('master.admin.users.users-list', compact('users'));
    }
    public function create()
    {
        //Gate::authorize('action',Permission::add_user);
         $programmes=Programme::all();
        $departments = Department::all();
        $menus = Menu::query()->with(['submenus', 'permissions'])->get();
        $roles = Role::query()->where('id', '!=', 1)->get();
        return view('master.admin.users.users-create',compact('roles','programmes','departments','menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit( $userid)
    {
        //Gate::authorize('action',Permission::edit_user);
        $user = User::list()->where('u.id', $userid)->first();
        if(!$user) return back()->with('error','User not found');
        $roles = Role::all();
        $departments = Department::all();
        $menus = Menu::query()->with(['submenus', 'permissions'])->get();
         return view('Master.admin.users.users-create',compact('roles','user','departments','menus'));
    }

    public function store(UserRequest $request)
    {
        $userarray = $request->get('user');
        if (empty($userarray['id'])) {//new
            $userarray['password'] = bcrypt('user123');
            $userarray['created_by'] = Auth::id();
            //Gate::authorize('action',Permission::add_user);
            User::query()->create($userarray);
        } else {//update
            //Gate::authorize('action',Permission::edit_user);
            $user = User::query()->find($userarray['id']);
            if (!$user) redirect()->back()->with('error', 'User not found');
            $userarray['updated_by'] = Auth::id();
            $user->update($userarray);
        }
        return redirect()->route('user.list')->with('success', 'User saved!');
    }

    public function destroy(string $id)
    {
        $user=User::find($id);
        if(!$user) return redirect()>with('error','User not found');
        $user->delete();
        return redirect()->route('users.list')->with('success','User delete');
    }


}
