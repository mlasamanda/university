@extends('master.admin.homeDashboard')
@section('content')
    <div class="card card-breadcrumb col-md-12 ">
        <div class="card-header">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@if(isset($department))
                            Edit
                        @else
                            Create
                        @endif Department</h5>
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
            <form action="{{route('department.store')}}" method="post" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="department[id]" value="{{isset($department)?$department->id:''}}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="username">Department</label>
                            <input id="username" type="text" name="department[name]" class="form-control" required
                                   placeholder=""
                                   value="{{isset($department)?$department->name:''}}">
                        </div>
                    </div>
                </div>
                    <!-- text input -->
                    <div class="d-flex justify-content-center mt-5 pb-3">
                        <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                <span class="d-flex align-items-center">
                                    <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                          style="display: none"></span>
                                    <span class="flex-grow-1">{{ !isset($department->id) ? 'Save' : 'Update' }}</span>
                                </span>
                        </button>
                    </div>
            </form>
        </div>

@endsection

