@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @if (session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Enrollments details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">enroll-mail</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"  src="{{Storage::disk('uploads')->url($enroll->image)}}" onerror="this.src='{{Storage::disk('uploads')->url('noimage.jpg')}}';" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$enroll->student_name}}</h3>

                                <p class="text-muted text-center"><a href="mailto:{{ $enroll->email }}">{{ $enroll->email }}</a></p>

                                    <ul class="list-group list-group-unbordered ">

                                    {{-- <li class="list-group-item">
                                        <b>Marital status</b> <a class="float-right">{{$enroll->marital_status}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Employment Status</b> <a class="float-right">{{$enroll->employment_status}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nationality</b> <a class="float-right">{{$enroll->nationality}}</a>
                                    </li> --}}
                                    {{-- <li class="list-group-item">
                                        <b>Received on</b> <a class="float-right">{{date('F j, Y', strtotime($enroll->created_at))}}</a>
                                    </li> --}}
                                    <li class="list-group-item">
                                        <b>Contact</b> <a class="float-right">{{$enroll->student_contact}}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About {{$enroll->student_name}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong></i> Gender</strong>

                                <p class="text-muted"> {{ $enroll->gender}} </p>
                                <hr>
                                <strong></i> Address</strong>

                                <p class="text-muted"> {{ $enroll->address }}</p>
                                <hr>
                                <strong></i> DOB</strong>

                                <p class="text-muted"> {{ $enroll->dob_bs }} BS , {{ $enroll->dob_ad }} AD </p>
                                {{-- <p class="text-muted"> </p> --}}

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#student" data-toggle="tab">Student Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#father" data-toggle="tab">Father Information</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="#mother" data-toggle="tab">Mother Information</a></li> --}}
                                    {{-- <li class="nav-item"><a class="nav-link" href="#local" data-toggle="tab">Local Guardian</a></li> --}}
                                    <li class="nav-item"><a class="nav-link" href="#pre" data-toggle="tab">Previous School Info</a></li>
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="student">

                                        <div class="post">
                                            Marital status : {{ $enroll->marital_status }}<br>
                                            Employment status : {{$enroll->employment_status}}<br>
                                            Stream : {{$enroll->applied_stream}} <br>
                                            Current Grade : {{$enroll->current_grade}} <br>
                                            Nationality : {{$enroll->nationality}}<br>
                                            Message : {{ $enroll->message }}
                                        </div>
                                    </div>


                                    <div class="tab-pane" id="father">

                                        <div class="post">
                                            Fathers's Name : {{$enroll->father_name }} <br>
                                            Contact Number : {{$enroll->father_contact }} <br>
                                            Email : {{ $enroll->father_email }} <br>
                                            Occupation : {{ $enroll->father_occupation }}
                                        </div>
                                    </div>

                                    {{-- <div class=" tab-pane" id="mother">

                                        <div class="post">
                                            Mother's Name : {{$enroll->mother_name }} <br>
                                            Contact Number : {{$enroll->mother_contact }} <br>
                                            Email : {{ $enroll->mother_email }} <br>
                                            Occupation : {{ $enroll->mother_occupation }}
                                        </div>
                                    </div>
                                    <div class=" tab-pane" id="local">
                                        <div class="post">
                                            Local Guardian's Name : {{$enroll->local_name }} <br>
                                            Contact Number : {{$enroll->local_contact }} <br>
                                            Email : {{ $enroll->local_email }} <br>
                                            Occupation : {{ $enroll->local_occupation }}
                                        </div>
                                    </div> --}}
                                    <div class=" tab-pane" id="pre">
                                        <div class="post">
                                            Name of Board/University : {{$enroll->previous_school }} <br>
                                            Year of Passing:  : {{$enroll->passed_year }} <br>
                                            Division : {{ $enroll->passed_division }}
                                            GPA : {{ $enroll->previous_gpa }} <br>
                                            Percentage of Marks/GPA : {{ $enroll->previous_gpa }}
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
