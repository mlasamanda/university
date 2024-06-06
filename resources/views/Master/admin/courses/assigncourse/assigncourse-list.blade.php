@extends('master.student.student-list')
@section('content')
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
{{--              <h3 class="card-title">Course List: <b>{{$assignCourses[1]->syofstudy}}</b></h3>--}}
            @if(\Illuminate\Support\Facades\Auth::user()->roleid=1)
                <li class="breadcrumb float-sm-right"><a href="{{route('assignCourse.create')}}">Assign Course</a>
                </li>
            @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                 <thead>
                <tr>
                    <th>S/N</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Credit</th>
                    <th>Semester</th>
                    <th>Department Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php($count=1)
                @foreach($assignCourses as $p)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$p->ccode}}</td>
                        <td>{{$p->cname}}</td>
                        <td>{{$p->ccredit}}</td>
                        <td>{{$p->sename}}</td>
                        <td>{{$p->pname}}</td>
                        <td>
                            <form action="{{route('course.destroy',$p->id)}}" method="post" class="m-0 p-0"
                                  onsubmit="return confirm('Do you want to delete this course ?')">
                                <a class="dropdown-item success" href="{{route('assignCourse.edit',$p->id)}}"><i
                                        class="far fa-edit"></i></a>
                                @csrf
                                @method('delete')
                                                                            <button class="btn  btn-sm"><i class="far fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Credit</th>
                        <th>Semester</th>
                        <th>Department Name</th>
                        <th></th>
                    </tr>
                    </tfoot>
                 </table>
        </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <!-- /.container-fluid -->
@endsection
