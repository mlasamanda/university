@extends('master.admin.homeDashboard')
@section('content')
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Course List</h3>
                <li class="breadcrumb float-sm-right"><a href="{{route('course.create')}}">Add Course</a></li>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Department Name</th>
                        <th>Credit</th>
                         <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($count=1)
                    @foreach($courses as $p)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$p->code}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->dname}}</td>
                            <td>{{$p->credit}}</td>
                             <td>
                                <form action="{{route('course.destroy',$p->id)}}" method="post" class="m-0 p-0"
                                      onsubmit="return confirm('Do you want to delete this department ?')">
                                    <a class="dropdown-item success" href="{{route('course.edit',$p->id)}}"><i class="far fa-edit"></i></a>
                                    @csrf
                                    @method('delete')
                                    {{--                                            <button class="btn  btn-sm"><i class="far fa-trash"></i></button>--}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Course Name</th>
                        <th>Department Name</th>
                        <th>Credit</th>
                        <th>Course Code</th>
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
