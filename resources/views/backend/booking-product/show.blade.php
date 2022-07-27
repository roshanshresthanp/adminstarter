@extends('backend.layouts.app')
@push('style')

@endpush
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
                        <h1>Booking Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">booking</li>
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
                                {{-- <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                </div> --}}

                                <h3 class="profile-username text-center">{{$booking->name}}</h3>

                                <p class="text-muted text-center">{{ $booking->email }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Contact</b> <a class="float-right">{{ $booking->contact_no }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Address</b> <a class="float-right"> {{ $booking->address }} </a>
                                    </li>
                                    {{-- <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right">{{$booking->gender}}</a>
                                    </li> --}}
                                    {{-- <li class="list-group-item">
                                        <b>Age</b> <a class="float-right">{{$booking->age}}</a>
                                    </li> --}}
                                    {{-- <li class="list-group-item">
                                        <b>Education</b> <a class="float-right">{{$booking->education}}</a>
                                    </li> --}}
                                </ul>

                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong></i>Type</strong>

                                <p class="text-muted"> {{ $booking->product_type }}</p>
                                <hr>
                                <strong></i>Title</strong>

                                <p class="text-muted"> {{ $booking->product_title }}</p>
                                <hr>
                                <strong></i>Price</strong>

                                <p class="text-muted"> {{ $booking->product_price }}</p>
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
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Message</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> --}}
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                      
                                        <!-- Post -->
                                        <div class="post">
                                            {!!$booking->message !!}

                                        </div>

                                        <!-- /.post -->
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
@push('scripts')


@endpush
