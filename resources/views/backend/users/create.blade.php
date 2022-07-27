@extends('backend.layouts.app')
@push('styles')

@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New User <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Users</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- <div class="row"> --}}
                    {{-- <div class="col-md-6"> --}}
                       <div class="card">
                           <div class="card-body">
                            <form action="{{route('users.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">

                                    <div class="col-sm-6 form-group">
                                        <label for="name">Full Name: </label>
                                        <input type="text" name="name" class="form-control" value="{{@old('name')}}" placeholder="Enter Full Name">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="email">Email: </label>
                                        <input type="text" name="email" class="form-control" value="{{@old('email')}}" placeholder="E-mail Address">
                                        @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="password">Password: </label>
                                        <input type="password" name="password" class="form-control" value="{{@old('password')}}" placeholder="Password">
                                        @error('password')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="confirmpassword">Confirm Password: </label>
                                        <input type="password" name="password_confirmation" class="form-control" value="{{@old('password_confirmation')}}" placeholder="Re-Enter Password">
                                        @error('password_confirmation')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                           </div>
                       </div>
                    {{-- </div> --}}
                {{-- </div> --}}

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('scripts')

@endpush
