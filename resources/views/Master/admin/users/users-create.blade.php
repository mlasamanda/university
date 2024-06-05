@extends('master.admin.homeDashboard')
@section('content')
    <div class="card card-breadcrumb ">
        <div class="card-header">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@if(isset($user))
                            Edit
                        @else
                            Create
                        @endif User</h5>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
            <form action="{{route('user.store')}}" method="post" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="user[id]" value="{{isset($user)?$user->id:''}}">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Username/Regno</label>
                            <input id="username" type="text" name="user[regno]" class="form-control" required
                                   placeholder="registration number"
                                   value="{{isset($user)?$user->regno:''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input id="fname" type="text" name="user[fname]" class="form-control" required
                                   placeholder="first name"
                                   value="{{isset($user)?$user->fname:''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="lname">Last name</label>
                            <input id="lname" type="text" name="user[lname]" class="form-control" required
                                   placeholder="last name"
                                   value="{{isset($user)?$user->lname:''}}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="user[email]" class="form-control" placeholder="email"
                                   value="{{isset($user)?$user->email:''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="mobileno" class="form-label">Mobile no</label>
                            <input id="mobileno" type="text" name="user[mobileno]" class="form-control"
                                   placeholder="Mobile no"
                                   value="{{isset($user)?$user->mobileno:''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="dob" class="form-label">DOB</label>
                            <input id="dob" type="date" name="user[dob]" class="form-control" required
                                   max="{{date('Y-m-d')}}"
                                   value="{{isset($user)?$user->dob:''}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label for="roleid" class="form-label">Role</label>
                            <select id="roleid" name="user[roleid]" class="form-select form-control" required readonly>
                                <option value="">--select role--</option>
                                @foreach($roles as $r)
                                    <option
                                        {{selected(isset($user)?$user->roleid:'',$r->id)}} value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label for="departmentid" class="form-label">Department Name</label>
                            <select id="departmentid" name="user[departmentid]" class="form-select form-control" required readonly>
                                <option value="">--select Department--</option>
                                @foreach($departments as $p)
                                    <option
                                        {{selected(isset($user)?$user->departmentid:'',$p->id)}} value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" name="user[gender]" class="form-select form-control" required>
                                <option value="">--select gender--</option>
                                <option
                                    {{selected(isset($user)?$user->gender:'',\App\Models\User::GENDER_MALE)}} value="{{\App\Models\User::GENDER_MALE}}">{{\App\Models\User::GENDER_MALE}}</option>
                                <option
                                    {{selected(isset($user)?$user->gender:'',\App\Models\User::GENDER_FEMALE)}} value="{{\App\Models\User::GENDER_FEMALE}}">{{\App\Models\User::GENDER_FEMALE}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="button" class="btn btn-primary" onclick="checkitems(true)"><i
                            class="ri-check-line"></i> check all
                    </button>
                    <button type="button" class="btn btn-dark" onclick="checkitems(false)"><i
                            class="ri-close-line"></i> uncheck all
                    </button>
                </div>
                <table id="" class="table nowrap align-middle table-sm table-bordered" style="width:100%;">
                    <thead>
                    <tr>
                        <th>Menu</th>
                        <th style="width: 40%">Submenu</th>
                        <th style="width: 45%">Permission</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($count=1)
                    @foreach($menus as $m)
                        <tr>
                            <td class="fs-3" style="vertical-align: middle">
                                <label class="form-check-label hstack gap-1 align-items-center">
                                    <span>{{$count++}}. {{$m->label}}</span>
                                    <input class="flex-shrink-0 me-2" type="checkbox"
                                           onchange="menuchecked(this)"
                                           style="height: 25px;width: 25px;">
                                </label>
                            </td>
                            <td style="vertical-align: top">
                                @foreach($m->submenus->chunk(3) as $chunk)
                                    <div class="row mb-1">
                                        @foreach($chunk as $s)
                                            <div class="col-lg-4">
                                                <label class="form-check-label hstack align-items-center">
                                                    <input class="flex-shrink-0 me-2" type="checkbox"
                                                           name="submenus[]" value="{{$s->id}}"
                                                           {{isset($role)&&$role->submenus->contains($s->id)?'checked':''}}
                                                           style="height: 15px;width: 15px;">
                                                    <span>{{$s->label}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($m->permissions->chunk(3) as $chunk)
                                    <div class="row mb-1">
                                        @foreach($chunk as $p)
                                            <div class="col-lg-4">
                                                <label class="form-check-label hstack align-items-center"
                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                       title="{{$p->description}}">
                                                    <input class="flex-shrink-0 me-2" type="checkbox"
                                                           name="user[permissionid]" value="{{$p->id}}"
                                                           {{isset($role)&&$role->permissions->contains($p->id)?'checked':''}}
                                                           style="height: 15px;width: 15px;">
                                                    <span>{{$p->label}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-5">
                <div class="d-flex justify-content-center mt-5 pb-3">
                    <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($user->id) ? 'Save' : 'Update' }}</span>
                                </span>
                    </button>
                </div>
            </form>
            </form>
        </div>

@endsection

