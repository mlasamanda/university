@extends('master.admin.homeDashboard')
@section('content')
    <div class="card card-breadcrumb col-md-12 ">
        <div class="card-header">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@if(isset($programme))
                            Edit
                        @else
                            Create
                        @endif Programme</h5>
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
            <form action="{{route('programme.store')}}" method="post" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="programme[id]" value="{{isset($programme)?$programme->id:''}}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Programme Name</label>
                            <input id="username" type="text" name="programme[name]" class="form-control" required
                                   placeholder=""
                                   value="{{isset($programme)?$programme->name:''}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Tuition Fee</label>
                            <input id="username" type="text" name="programme[tutionfees]" class="form-control" required
                                   placeholder=""
                                   value="{{isset($programme)?$programme->tutionfees:''}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Programme Duration</label>
                            <input id="username" type="text" name="programme[duration]" class="form-control" required
                                   placeholder=""
                                   value="{{isset($programme)?$programme->duration:''}}">
                        </div>
                    </div>

                    <div class="col-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Programme Code</label>
                            <input id="code" type="text" name="programme[pcode]" class="form-control" required
                                   placeholder=""
                                   value="{{isset($programme)?$programme->pcode:''}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <label for="departmentid" class="form-label">Department Name</label>
                            <select id="departmentid" name="programme[departmentid]" class="form-select form-control" required readonly>
                                <option value="">--select Department--</option>
                                @foreach($departments as $p)
                                    <option
                                        {{selected(isset($programme)?$programme->departmentid:'',$p->id)}} value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <!-- text input -->
                <div class="d-flex justify-content-center mt-5 pb-3">
                    <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($programme->id) ? 'Save' : 'Update' }}</span>
                                </span>
                    </button>
                </div>
            </form>
        </div>

@endsection

