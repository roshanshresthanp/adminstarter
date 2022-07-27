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
    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create a Award <a href="{{ route('awards.index') }}" class="btn btn-primary">View Awards</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Awards</li>
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
                                    @isset($award)
                                    <form action="{{ route('awards.update', $award->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                    @else
                                    <form action="{{ route('awards.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("POST")
                                    @endisset
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Awards Title">Title :</label>
                                                    <input type="text" class="form-control" name="title" value="{{isset($award)?$award->title:old('title') }}" placeholder="Enter Award Title">
                                                    <p class="text-danger">
                                                        {{ $errors->first('title') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Awards type">Select award type :</label>
                                                    <select class="form-control"  name="award_category_id">
                                                    @foreach ($cats as $type)
                                                    <option value="{{ $type->id }}" @isset($award) @if($type->id==$award->award_category_id) selected @endif @endisset>{{ $type->title }}</option>
                                                    @endforeach
                                                    </select>
                                                    <p class="text-danger">
                                                        {{ $errors->first('award_category_id') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cover_image">Cover image:</label>
                                                    <input type="file" class="form-control" name="cover_image" id="cover_image" onchange="loadCover(event)">
                                                    <img id="cover_image_output" style="height: 100px;" src="{{ Storage::disk('uploads')->url(isset($award)?$award->cover_image:'noimage.jpg') }}">
                                                    <p class="text-danger">
                                                        {{ $errors->first('cover_image') }}
                                                    </p>
                                                </div>
                                            </div>
{{-- 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="icon">Icon image:</label>
                                                    <input type="file" class="form-control" name="icon" id="icon" onchange="loadIcon(event)">
                                                    <img id="icon_output" style="height: 100px;" src="{{ Storage::disk('uploads')->url('noimage.jpg') }}">
                                                    <p class="text-danger">
                                                        {{ $errors->first('icon') }}
                                                    </p>
                                                </div>
                                            </div> --}}


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="banner_image">Banner Image:</label>
                                                    <input type="file" class="form-control" name="banner_image" id="banner_image" onchange="loadBanner(event)">
                                                    <img id="banner_output" style="height: 100px;" src="{{ Storage::disk('uploads')->url(isset($award)?$award->banner_image:'noimage.jpg')}}">
                                                    <p class="text-danger">
                                                        {{ $errors->first('banner_image') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Active">Active: </label>
                                                    <label class="switch pt-0">
                                                        <input type="checkbox" name="publish_status" value="1" @isset($award) @if($award->publish_status==1) checked @endif @endisset >
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Content">Awards Content :</label>
                                                    <textarea name="description" id="summernote" class="form-control">{{isset($award)?$award->description:old('description') }}</textarea>
                                                    <p class="text-danger">
                                                        {{ $errors->first('description') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <hr>
                                                <h3>Meta Information</h3>
                                                <hr>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title(Optional): </label>
                                                    <input type="text" class="form-control" value="{{isset($award)?$award->meta_title:old('meta_title') }}" name="meta_title" placeholder="Meta Title for SEO" value="">
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_title') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_keywords">Meta Keywords(Optional): </label>
                                                    <input type="text" class="form-control" value="{{isset($award)?$award->meta_keywords:old('meta_keywords')}}" name="meta_keywords" placeholder="Meta Keywords for SEO" value="">
                                                    <p class="text-danger">
                                                        {{ $errors->first('meta_keywords') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="meta-description">Meta Description (optional):</label>
                                                    <textarea name="meta_description" cols="30"  rows="5" class="form-control" placeholder="Meta description..">{{isset($award)?$award->meta_description:old('meta_description') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="og_image">OG Image (1200 X 600): </label>
                                                    <input type="file" class="form-control" name="og_image" onchange="loadOg(event)">
                                                    <p class="text-danger">
                                                        {{ $errors->first('og_image') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Current Og:</label> <br>
                                                <img id="current_og" style="height: 100px;" src="{{ Storage::disk('uploads')->url(isset($award)?$award->og_image:'noimage.jpg') }}">
                                            </div>

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
    <script>
        var loadCover = function(event) {
            var output = document.getElementById('cover_image_output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
    <!-- summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $('#summernote').summernote({
            height: 300,
            placeholder: "Awards content.."
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

    var loadIcon = function(event) {
        var output = document.getElementById('icon_output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };

    var loadBanner = function(event) {
        var output = document.getElementById('banner_output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };
</script>
@endpush
