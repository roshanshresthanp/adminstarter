@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 "><i class="fas fa-cogs"></i>  Company Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
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
                            <div class="card card-primary card-outline card-tabs">
                              <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Company Profile</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Meta Info</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Home Info</a>
                                  </li>
                                  {{-- <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Settings</a>
                                  </li> --}}
                                </ul>
                              </div>
                              <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">

                                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                        @include('backend.setting.company-profile')
                                    </div>
                                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                        <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT")
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="meta_title">Meta Title(Optional): </label>
                                                        <input type="text" class="form-control" name="meta_title" placeholder="Meta Title for SEO" value="{{ $setting->meta_title }}">
                                                        <p class="text-danger">
                                                            {{ $errors->first('meta_title') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="meta_keywords">Meta Keywords(Optional): </label>
                                                        <input type="text" class="form-control" name="meta_keywords" placeholder="Meta Keywords for SEO" value="{{ $setting->meta_keywords }}">
                                                        <p class="text-danger">
                                                            {{ $errors->first('meta_keywords') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="meta-description">Meta Description (optional):</label>
                                                        <textarea name="meta_description" cols="30" rows="5" class="form-control" placeholder="Meta description..">{{ $setting->meta_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="og_image">OG Image (1200 X 600): </label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                          <a id="lfm" data-input="thumbnail111" data-preview="holder111" class="btn btn-primary lfm" >
                                                            <i class="fa fa-picture-o"></i> Choose
                                                          </a>
                                                        </span>
                                                        <input id="thumbnail111" class="form-control" value="{{$setting->og_image}}" type="text" name="og_image" onchange="loadOg()" readonly>
                                                      </div>
                                                      <img id="holder111" style="margin-top:15px;max-height:100px;">
                                                      <p class="text-danger">
                                                        {{ $errors->first('og_image') }}
                                                    </p>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="">Current Og:</label> <br>
                                                    <img id="current_og" style="height: 100px;" src="{{$setting->og_image??Storage::disk('uploads')->url('noimage.jpg')}}">
                                                </div>

                                                <div class="col-md-12 text-center mt-4">
                                                    <button type="submit" class="btn btn-success" name="metaSetting">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">

                                        @include('backend.setting.front-info')
                                    </div>
                                  {{-- <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                  </div> --}}
                                </div>
                              </div>
                              <!-- /.card -->
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
        $(function() {
            $('.province').change(function() {
                var province_no = $(this).children("option:selected").val();
                function fillSelect(districts) {
                    document.getElementById("district").innerHTML =
                    districts.reduce((tmp, x) => `${tmp}<option value='${x.id}'>${x.dist_name}</option>`, '');
                }
                function fetchRecords(province_no) {

                    var uri = "{{ route('getdistricts', ':no') }}";
                    uri = uri.replace(':no', province_no);
                    $.ajax({
                        url: uri,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            var districts = response;
                            // console.log(districts);
                            fillSelect(districts);
                        }
                    });
                }
                fetchRecords(province_no);
            })
        });
    </script>
    <script>
        var loadLogo = function(){
            var output = document.getElementById('company_logo_output');
            output.src = document.getElementById('thumbnail').value;
            output.onload = output.src;
        };
        var loadFooterLogo = function(){
            var output = document.getElementById('footer_logo_output');
            output.src = document.getElementById('thumbnail1').value;
            output.onload = output.src;
        };
        var loadFavicon = function(){
            var output = document.getElementById('company_favicon_output');
            output.src = document.getElementById('thumbnail11').value
            output.onload = output.src;
        };

        var loadHomeBg = function(){
            var output = document.getElementById('home_bg_output');
            output.src = document.getElementById('thumbnail112').value
            output.onload = output.src;
        };

    var loadOg = function() {
        var output = document.getElementById('current_og');
        output.src = document.getElementById('thumbnail111').value;
        output.onload = output.src;
    };
</script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.lfm').filemanager('image');
            // $('.select2').select2();
        });
    </script>
@endpush
