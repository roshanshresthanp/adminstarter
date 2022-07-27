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
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> --}} --}}
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create popup <a href="{{ route('popup.index') }}" class="btn btn-primary">View Popup</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">pop-up</li>
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
                                    @isset($popup)
                                    <form action="{{ route('popup.update', $popup->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                    @else
                                    <form action="{{ route('popup.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("POST")
                                    @endif
                                    <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Services Title">Title(Optional) :</label>
                                                    <input type="text" value="{{ isset($popup)?$popup->title:old('title') }}" class="form-control" name="title" placeholder="Enter Popup">
                                                    <p class="text-danger">
                                                        {{ $errors->first('title') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Services Title">Link(Optional) :</label>
                                                    <input type="text" value="{{ isset($popup)?$popup->link:old('link') }}" class="form-control" name="link" placeholder="Enter link">
                                                    <p class="text-danger">
                                                        {{ $errors->first('link') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="banner_image">Image:</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary lfm" >
                                                        <i class="fa fa-picture-o"></i> Choose
                                                      </a>
                                                    </span>
                                                    <input id="thumbnail1" value="{{old('image',@$popup->image)}}" class="form-control" type="text" name="image" readonly>
                                                  </div>
                                                  <img id="holder1" style="margin-top:15px;max-height:100px;">
                                                  <p class="text-danger">
                                                    {{ $errors->first('image') }}
                                                </p>
                                            </div>




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="banner_image">Show On</label>
                                                <select class="form-control" name="show_on" required>
                                                   <option value="all-pages" @isset($popup) @if($popup->show_on=='all-pages') selected  @endif  @endisset>All Pages</option>
                                                   <option value="home-page-only" @isset($popup) @if($popup->show_on=='home-page-only') selected  @endif  @endisset>Home Page only</option>
                                                   <option value="detail-page-only" @isset($popup) @if($popup->show_on=='detail-page-only') selected  @endif  @endisset>Detail page only</option>
                                                </select>
                                                    <p class="text-danger">
                                                        {{ $errors->first('show_on') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Content">Description(Optional) :</label>
                                                    <textarea name="description" id="summernote" class="form-control">{{isset($popup)?$popup->description:old('description') }}</textarea>
                                                    <p class="text-danger">
                                                        {{ $errors->first('description') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Active">Active: </label>
                                                    <label class="switch pt-0">
                                                        <input type="checkbox" name="publish_status" @if(isset($popup)) @if($popup->publish_status==1) checked @endif @endif value="1">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
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
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.lfm').filemanager('image');

    });
</script>
@endpush
