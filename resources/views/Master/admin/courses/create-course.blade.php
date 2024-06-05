@extends('master.admin.homeDashboard')
@section('content')
    <div class="card card-breadcrumb col-md-12 ">
        <div class="card-header">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@if(isset($course))
                            Edit
                        @else
                            Create
                        @endif Course</h5>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">
            <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
            <form action="{{route('course.store')}}" method="post" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="course[id]" value="{{isset($course)?$course->id:''}}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Course Name</label>
                            <input id="username" type="text" name="course[name]" class="form-control" required
                                   placeholder=""
                                   value="{{isset($course)?$course->name:''}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Credit</label>
                            <input id="username" type="text" name="course[credit]" class="form-control" required
                                   placeholder=""
                                   value="{{isset($course)?$course->credit:''}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Course Code</label>
                            <input id="code" type="text" name="course[code]" class="form-control" required
                                   placeholder=""
                                   value="{{isset($course)?$course->code:''}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <label for="departmentid" class="form-label">Department Name</label>
                            <select id="departmentid" name="course[departmentid]" class="form-select form-control" required readonly>
                                <option value="">--select Department--</option>
                                @foreach($departments as $p)
                                    <option
                                        {{selected(isset($course)?$course->departmentid:'',$p->id)}} value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
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
                                                           name="permissions[]" value="{{$p->id}}"
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
                <!-- text input -->
                <div class="d-flex justify-content-center mt-5 pb-3">
                    <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($course->id) ? 'Save' : 'Update' }}</span>
                                </span>
                    </button>
                </div>
            </form>
        </div>

@endsection

