@extends('master.admin.homeDashboard')

@section('content')

    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card-body">
                @if (session('user_regno'))
                    <p>Staff Email: {{ session('user_email') }}</p>
                    <p>Registration Number: {{ session('user_regno') }}</p>
                    <p>Mobile Number :{{session('user_mobile')}}</p>
                    <p>Login in: {{ \Illuminate\Support\Carbon::now()}}</p>


                @endif


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <!-- /.container-fluid -->
@endsection
