@extends('master.admin.homeDashboard')
@section('content')
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Create Role</h3>
            </div>
            <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
            <form action="{{route('role.save')}}" method="post" onsubmit="return validateforminputs(this)">
                @csrf
                <input type="hidden" name="role[id]" value="{{isset($role)?$role->id:''}}">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Role Name</label>
                            <input id="name" type="text" name="role[name]" class="form-control" required
                                   placeholder="eg. student, admin"
                                   value="{{isset($role)?$role->name:request('name')}}"></div>
                    </div>


{{--                    <div class="form-group col-md-4">--}}
{{--                        <div>--}}
{{--                            <label for="replicate" class="form-label">Replicate from</label>--}}
{{--                            <select id="replicate" class="form-select " id="exampleSelectBorder"--}}
{{--                                    onchange="replicaterole()">--}}
{{--                                <option value="">--replicate from--</option>--}}
{{--                                @foreach($roles as $r)--}}
{{--                                    <option--}}
{{--                                        {{selected(request('replicateid'),$r->id)}} value="{{$r->id}}">{{$r->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
                        <button type="submit" class="btn btn-success btn-load btn-lg save-btn">
                                 <span class="d-flex align-items-center">
                                     <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                           style="display: none"></span>
                                     <span class="flex-grow-1">Save</span>
                                 </span>
                        </button>
                    </div>

                </div>
            </form>

        </div>
        <!--end col-->
        @endsection

