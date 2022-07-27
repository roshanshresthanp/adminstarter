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
                        <h1>Update User <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a></h1>
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
        <section class="content mb-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                       <div class="card">
                           <div class="card-header">
                               <h3>User Details</h3>
                           </div>
                           <div class="card-body">
                            <form action="{{route('users.update', $existing_user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Full Name: </label>
                                        <input type="text" name="name" class="form-control" value="{{$existing_user->name}}" placeholder="Enter Full Name">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email: </label>
                                        <input type="text" name="email" class="form-control" value="{{$existing_user->email}}" placeholder="E-mail Address">
                                        @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" name="updatedetails" class="btn btn-success">Submit</button>
                                </form>
                           </div>
                       </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Change Password</h3>
                            </div>
                            <div class="card-body">

                                <p class="text-danger">Note*: If you dont want to change password then leave empty</p>
                                <form action="{{route('users.update', $existing_user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="oldpassword">Old Password: </label>
                                        <input type="password" name="oldpassword" class="form-control" value="{{@old('oldpassword')}}" placeholder="Old Password">
                                        @error('oldpassword')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        @if (session('errorpass'))
                                            <div class="col-sm-12">
                                                <p class="text-danger">
                                                    {{ session('errorpass') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password: </label>
                                        <input type="password" name="new_password" class="form-control" value="{{@old('new_password')}}" placeholder="New Password">
                                        @error('new_password')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        @if (session('error'))
                                            <div class="col-sm-12">
                                                <p class="text-danger">
                                                    {{ session('error') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmpassword">Confirm New Password: </label>
                                        <input type="password" name="new_password_confirmation" class="form-control" value="{{@old('password_confirmation')}}" placeholder="Re-Enter New Password">
                                        @error('new_password_confirmation')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success" name="updatepassword">Submit</button>
                                </form>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('scripts')

@endpush
