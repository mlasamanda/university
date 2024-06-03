@extends('master.admin.homeDashboard')
@section('content')
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User List</h3>
                <li class="breadcrumb float-sm-right"><a href="{{route('user.create')}}">Add User</a></li>
            </div>
            <!-- /.card-header -->
            <!-- /.card-header -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Department Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($count=1)
                    @foreach($users as $u)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$u->fullname}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->regno}}</td>
                            <td>{{$u->gender}}</td>
                            <td>{{$u->mobileno}}</td>
                            <td>{{$u->rolename}}</td>
                            <td>{{$u->departmentname}}</td>
                            <td>
                                <form action="{{route('user.destroy',$u->id)}}" method="post" class="m-0 p-0"
                                      onsubmit="return confirm('Do you want to delete this role?')">
                                    <a class="dropdown-item success" href="{{route('user.edit',$u->id)}}"><i
                                            class="far fa-edit"></i></a>
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
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Role</th>
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
