@extends('backend.layouts.app')
@push('styles')
    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
                    <h1 class="m-0">Create a Category <a href="{{ route('product-category.index') }}" class="btn btn-primary">View Category</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">product-category</li>
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
                                    @isset($cat)
                                    <form action="{{ route('product-category.update', $cat->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                    @else
                                    <form action="{{ route('product-category.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("POST")
                                    @endif
                                    
                                        <div class="row">
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="brand_image">Brand image:</label>
                                                    <input type="file" class="form-control" name="brand_image" id="brand_image" onchange="loadCover(event)">
                                                    <p class="text-danger">
                                                        {{ $errors->first('brand_image') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Preview:</label><br>
                                                <img id="cover_image_output" style="height: 100px;" src="{{ Storage::disk('uploads')->url('noimage.jpg') }}">
                                            </div> --}}

                                            <div class="col-md-6 mt-4">
                                                <div class="form-group">
                                                    <label for="Brand Title">Category Name :</label>
                                                    <input type="text" class="form-control" name="title" placeholder="Enter Category Name" value="{{isset($cat->title)?$cat->title:old('title');}}">
                                                    <p class="text-danger">
                                                        {{ $errors->first('title') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Active">Active: </label>
                                                    <label class="switch pt-0">
                                                        <input type="checkbox" name="publish_status" value="1" @if(isset($cat)) @if($cat->publish_status==1) checked @endif @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-4">
                                                <div class="form-group">
                                                    <label for="">Description :</label>
                                                    <textarea type="textarea" class="form-control" name="description" placeholder="Enter Category Description">{{isset($cat->description)?$cat->description:old('description');}}</textarea>
                                                    <p class="text-danger">
                                                        {{ $errors->first('description') }}
                                                    </p>
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
<script>
    var loadCover = function(event) {
        var output = document.getElementById('cover_image_output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };
</script>
@endpush
