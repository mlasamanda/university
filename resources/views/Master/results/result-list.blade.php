@extends('master.student.student-list')
@section('content')
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h2>{{$results[0]->programme}}</h2>
                <h3 class="card-title">Semester Result <b>{{$results[0]->semester}}</b>
                    <b>{{$results[0]->year}}</b></h3>
                @if(\Illuminate\Support\Facades\Auth::user()->roleid=1)
                    <li class="breadcrumb float-sm-right"><a href="{{route('result.create')}}">Add Result</a>
                    </li>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Code</th>
                        <th>Course Name</th>
                        <th>Credit</th>
                        <th>CourseWork</th>
                        <th>mark</th>
                        <th>Total Grade</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($count=1)
                    @foreach($results as $p)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$p->code}}</td>
                            <td>{{$p->course}}</td>
                            <td class="credit">{{$p->credit}}</td>
                            <td class="coursework">{{$p->coursework}}</td>
                            <td class="mark">{{$p->mark}}</td>
                            <td class="result"></td>
                         </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <!-- /.container-fluid -->
@endsection
