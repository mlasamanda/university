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

