@extends('backend.layouts.app')
@push('styles')
    <style>
       .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

        input:checked + .slider {
        background-color: #2196F3;
    }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
    }

        .slider.round:before {
        border-radius: 50%;
    }
    .hide{
        display: none;

    }
    .show{
        display: block;
    }
    </style>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@isset($album) Update Album => {{ $album->album_title }} @else Create an Album @endisset <a href="{{ route('album.index') }}" class="btn btn-primary">View Albums</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Albums</li>
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
                                    @isset($album)
                                    <form action="{{ route('album.update', $album->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                    @else
                                    <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("POST")
                                    @endisset
                                    
                                        <div class="row">
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="album_cover">Album Cover:</label>
                                                    <input type="file" class="form-control" name="album_cover" id="album_cover" onchange="loadCover(event)">
                                                    <p class="text-danger">
                                                        {{ $errors->first('album_cover') }}
                                                    </p>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="col-md-6">
                                                <label for="image_preview">Cover Preview:</label> <br>
                                                <img id="album_cover_output" style="height: 100px;width: 180px;" src="{{ Storage::disk('uploads')->url('noimage.jpg') }}">
                                            </div> --}}
                                            <div class="col-md-6">
                                                <label for="album_cover">Album Cover:</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm1" data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm" >
                                                        <i class="fa fa-picture-o"></i> Choose
                                                      </a>
                                                    </span>
                                                    <input id="thumbnail" class="form-control" value="{{old('album_cover',@$album->album_cover)}}" type="text" name="album_cover" readonly>
                                                  </div>
                                                  <img id="holder" style="margin-top:15px;max-height:100px;">
                                                  <p class="text-danger">
                                                    {{$errors->first('album_cover')}}
                                                 </p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="album_cover">Select banner image :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm1" data-input="thumbnail12" data-preview="holder12" class="btn btn-primary lfm" >
                                                        <i class="fa fa-picture-o"></i> Choose
                                                      </a>
                                                    </span>
                                                    <input id="thumbnail12" value="{{old('banner_image',@$album->banner_image)}}" class="form-control" type="text" name="banner_image" readonly>
                                                  </div>
                                                  <img id="holder12" style="margin-top:15px;max-height:100px;">
                                                  <p class="text-danger">
                                                    {{$errors->first('banner_image')}}
                                                 </p>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Album Title">Album Title :</label>
                                                    <input type="text" value="{{old('album_title',@$album->album_title) }}" class="form-control" name="album_title" placeholder="Enter Album Title">
                                                    <p class="text-danger">
                                                        {{ $errors->first('album_title') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Active">Active: </label>
                                                    <label class="switch pt-0">
                                                        <input type="checkbox" @isset($album) @if($album->publish_status==1) checked @endif @endisset name="publish_status" value="1">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <hr>
                                                <h3>Album Images</h3>
                                                <hr>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="album_cover">Select Album images :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary lfm" >
                                                        <i class="fa fa-picture-o"></i> Choose multiple
                                                      </a>
                                                    </span>
                                                    <input id="thumbnail1" @isset($album) placeholder="{{$album->image()->pluck('album_images')}}" @endisset class="form-control" type="text" name="album_images" readonly>
                                                  </div>
                                                  <img id="holder1" style="margin-top:15px;max-height:100px;">
                                                  <p class="text-danger">
                                                    {{$errors->first('album_images')}}
                                                 </p>
                                            </div>

                                            {{-- <div class="col-md-12 user-image mb-3 text-center">
                                                <div class="imgPreview"> </div>
                                            </div> --}}


                                            <div class="col-md-12 text-center mt-4">
                                                <hr>
                                                <h3>Meta Information</h3>
                                                <hr>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title(Optional): </label>
                                                    <input type="text" class="form-control" name="meta_title" placeholder="Meta Title for SEO" value="{{ old('meta_title',@$album->meta_title)}}">
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_title') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_keywords">Meta Keywords(Optional): </label>
                                                    <input type="text" class="form-control" name="meta_keywords" placeholder="Meta Keywords for SEO" value="{{ old('meta_keywords',@$album->meta_keywords)}}">
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_keywords') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="meta-description">Meta Description (optional):</label>
                                                    <textarea name="meta_description" cols="30" rows="5" class="form-control" placeholder="Meta description.." > {{ old('meta_description',@$album->meta_description)}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Og Image:</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm1" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary lfm" >
                                                        <i class="fa fa-picture-o"></i> Choose
                                                      </a>
                                                    </span>
                                                    <input id="thumbnail2" class="form-control" value="{{old('og_image',@$album->og_image)}}" type="text" name="og_image" readonly>
                                                  </div>
                                                  <img id="holder2" style="margin-top:15px;max-height:100px;">
                                                  <p class="text-danger">
                                                    {{ $errors->first('og_image') }}
                                                </p>
                                            </div>
{{-- 
                                            <div class="col-md-6">
                                                <label for="">Current Og:</label> <br>
                                                <img id="current_og" style="height: 100px;" src="{{ Storage::disk('uploads')->url('noimage.jpg') }}">
                                            </div> --}}

                                            <div class="col-md-12">
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
    {{-- <script>
        var loadCover = function(event) {
            var output = document.getElementById('album_cover_output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script> --}}


    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.lfm').filemanager('image');

        });
    </script>
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });
    </script>
    <script>
        var loadOg = function(event) {
            var output = document.getElementById('current_og');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endpush
