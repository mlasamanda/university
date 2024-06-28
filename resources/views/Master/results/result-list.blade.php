@extends('master.student.student-list')
@section('content')
    @if (session('user_regno'))

        @if(session('user_regno'))
            <p>Registration Number: {{ session('user_regno')  }}</p>
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        {{--                <h2>{{$results[0]->programme}}</h2>--}}
                        {{--                <h3 class="card-title">Semester Result <b>{{$results[0]->semester}}</b>--}}
                        {{--                    <b>{{$results[0]->year}}</b></h3>--}}
                        @if(\Illuminate\Support\Facades\Auth::user()->roleid=1)
                            <li class="breadcrumb float-sm-right"><a href="{{route('result.create')}}">Add Result</a>
                            </li>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="marksTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Code</th>
                                <th>Course Name</th>
                                <th>Credit</th>
                                <th>CourseWork</th>
                                <th>mark</th>
                                <th>Total Mark</th>
                                <th>Grade</th>
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
                                    <td class="">{{$p->mark}}</td>
                                    <td>{{$p->total}}</td>
                                    <td class="mark">
                                        @if($p->total>=80 && $p->total<=100)
                                            A
                                        @elseif($p->total>=70)
                                            B+
                                        @elseif($p->total>=60)
                                            B
                                        @elseif($p->total>=40)
                                            C
                                        @elseif($p->total>=35)
                                            D
                                        @else
                                            F
                                        @endif
                                    </td>
                                    <td class="marks"> @if($p->total>=80 && $p->total<=100)
                                            {{$p->credit*5}}
                                        @elseif($p->total>=70)
                                            {{$p->credit*4}}
                                        @elseif($p->total>=60)
                                            {{$p->credit*3}}
                                        @elseif($p->total>=40)
                                            {{$p->credit*2}}
                                        @elseif($p->total>=35)
                                            {{$p->credit*1.5}}
                                        @else
                                           {{$p->credit*1}}
                                        @endif</td>

                                </tr>

                            @endforeach
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th id="credit"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <p id="total"></p>
                                    <p id="gpa"></p>
                                </th>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        @endif
    <!-- /.col -->
    <!-- /.container-fluid -->
    @endif
@endsection
