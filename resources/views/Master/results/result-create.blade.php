@extends('master.student.student-list')
@section('content')
    <div class="card card-breadcrumb col-md-12 ">
        <div class="card-header">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@if(isset($course))
                            Edit
                        @else
                            Assign
                        @endif Result</h5>
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
            <form action="{{route('result.store')}}" method="post" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="course[id]" value="{{isset($course)?$course->id:''}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <label for="courseid" class="form-label">Course Name</label>
                            <select id="courseid" name="course[courseid]" class="form-select form-control" required readonly>
                                <option value="">--select Course--</option>
                                @foreach($courses as $p)
                                    <option
                                        {{selected(isset($course)?$course->courseid:'',$p->id)}} value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="username">Mark</label>
                        <input id="username" type="text" name="course[mark]" class="form-control" required
                               placeholder=""
                               value="{{isset($course)?$course->mark:''}}">
                    </div>


                    <div class="col-md-6">
                        <div>
                            <label for="programmeid" class="form-label">Programme Name</label>
                            <select id="programmeid" name="course[programmeid]" class="form-select form-control" required readonly>
                                <option value="">--select Department--</option>
                                @foreach($programmes as $p)
                                    <option
                                        {{selected(isset($course)?$course->programmeid:'',$p->id)}} value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="semesterid" class="form-label">Semester</label>
                            <select id="semesterid" name="course[semesterid]" class="form-select form-control" required>
                                <option value="">--select semester--</option>
                                @foreach($semester as $p)
                                    <option
                                        {{selected(isset($course)?$course->semesterid:'',$p->id)}} value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="courseworkid" class="form-label">Coursework</label>
                            <select id="courseworkid" name="course[courseworkid]" class="form-select form-control" required readonly>
                                <option value="">--select semester--</option>
                                @foreach($coursework as $p)
                                    <option
                                        {{selected(isset($course)?$course->$courseworkid:'',$p->id)}} value="{{$p->id}}">{{$p->name}}</option>
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
                                    <span class="flex-grow-1">{{ !isset($course->id) ? 'Save' : 'Update' }}</span>
                                </span>
                    </button>
                </div>
            </form>
        </div>

@endsection

