@extends('master.student.student-list')
@section('content')
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h2>{{$courseworks[0]->programme}}</h2>
                <h3 class="card-title">Course List: <b>{{$courseworks[0]->semester}}</b>
                       {{$courseworks[0]->syofstudy}}</b></h3>
                @if(\Illuminate\Support\Facades\Auth::user()->roleid=1)
                    <li class="breadcrumb float-sm-right"><a href="{{route('coursework.create')}}">Assign Course</a>
                    </li>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Credit</th>
                        <th>Marks</th>
                         <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($count=1)
                    @foreach($courseworks as $p)
                        @if($p->name>=16)

                            $status="Pass"
                        @else
                            $status="Failed'
                        @endif
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$p->ccode}}</td>
                            <td>{{$p->ncourse}}</td>
                            <td>{{$p->ccredit}}</td>
                            <td>{{$p->name}}</td>
                             <td>{{$status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <th>S/N</th>--}}
{{--                        <th>Course Code</th>--}}
{{--                        <th>Course Name</th>--}}
{{--                        <th>Credit</th>--}}
{{--                        <th>Semester</th>--}}
{{--                        <th>Department Name</th>--}}
{{--                        <th></th>--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <!-- /.container-fluid -->
@endsection
