@extends('Master.admin.homeDashboard')
@section('content')
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Role List</h3>
                @if(auth()->user()->roleid==1)
                    <li class="breadcrumb float-sm-right"><a href="{{route('role.create')}}">Add Role</a></li>
                @endif
            </div>
            <!-- /.card-header -->
            <!-- /.card-header -->
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Role</th>
                        <th>UserCount</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($count=1)
                    @foreach($roles as $r)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$r->name}}</td>
                            <td>{{$r->usercount}}</td>
                            <td>
                                @if($r->id!=1)
                                    <form action="{{route('role.delete',$r->id)}}" method="post" class="m-0 p-0"
                                          onsubmit="return confirm('Do you want to delete this role?')">
                                        <a class="dropdown-item success" href="{{route('role.edit',$r->id)}}"><i
                                                    class="far fa-edit"></i></a>
                                        @csrf
                                        @method('delete')
                                     </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Role Name</th>
                        <th>UserCount</th>
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
