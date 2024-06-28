@extends('master.student.student-list')
@section('content')
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <p>Registration Number: {{ session('user_regno')  }}</p>
{{--                <h2>{{$courseworks[0]->programme}}</h2>--}}
{{--                <h3 class="card-title">Course List: <b>{{$courseworks[0]->semester}}</b>--}}
{{--                                  <b>{{$courseworks[0]->syofstudy}}</b></h3>--}}
                @if(\Illuminate\Support\Facades\Auth::user()->roleid=1)
                    <li class="breadcrumb float-sm-right"><a href="{{route('coursework.create')}}">Add CourseWork</a>
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
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$p->ccode}}</td>
                            <td>{{$p->ncourse}}</td>
                            <td>{{$p->ccredit}}</td>
                            <td>{{$p->name}}</td>
                             <td>{{$p->status}}</td>
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
