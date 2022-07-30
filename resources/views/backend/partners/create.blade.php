@extends('backend.layouts.app')
@push('styles')
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> @isset($existing_partner) Update Partner Info @else New Partner @endif  <a href="{{ route('partner.index') }}" class="btn btn-primary">View Partners</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Partner</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @isset($existing_partner)
                                    <form action="{{ route('partner.update', $existing_partner->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                    @else
                                    <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("POST")
                                    @endisset
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="partner_name">Partner Name: </label>
                                                    <input type="text" class="form-control" value="{{ old('partner_name',@$existing_partner->partner_name) }}" name="partner_name" placeholder="Partner Name">
                                                    <p class="text-danger">
                                                        {{ $errors->first('partner_name') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="banner_image">Partner logo:</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm1" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary lfm" >
                                                        <i class="fa fa-picture-o"></i> Choose
                                                      </a>
                                                    </span>
                                                    <input id="thumbnail2" class="form-control" value="{{old('partner_logo',@$existing_partner->partner_logo)}}" type="text" name="partner_logo" readonly>
                                                  </div>
                                                  <img id="holder2" style="margin-top:15px;max-height:100px;">
                                                  <p class="text-danger">
                                                    {{ $errors->first('partner_logo') }}
                                                </p>
                                            </div>

                                            {{-- <div class="col-md-3">
                                                <label for="">Logo Preview:</label>
                                                <img id="partner_logo_output" style="height: 150px; width:150px;" src="{{ Storage::disk('uploads')->url('noimage.jpg') }}">
                                            </div> --}}

                                            

                                            <div class="col-md-12 mt-4">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.lfm').filemanager('image');
        });
    </script>
    {{-- <script>
        var loadLogo = function(event) {
            var output = document.getElementById('partner_logo_output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script> --}}
@endpush
