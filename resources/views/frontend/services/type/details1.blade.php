@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<section id="inner_page_header" style="background-image:url({{ $details->banner_image == null ? asset('frontend/images/1619957642.png') : Storage::disk('uploads')->url($details->cover_image) }})" class="text_place">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    <li><a href="{{route('index')}}">Home</a>/</li>
                    <li><a href="{{url()->current()}}">{{$details->title}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="page_in_wrapper" class="o_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="page_content_area_">
                    <div class="in_page_thumbnail">
                        <img src="{{Storage::disk('uploads')->url($details->icon)}}" alt="{{$details->title}}">
                    </div>
                    <h3>{{$details->title}}</h3>
                    <p>{!!$details->content!!}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page_slide_or">
                    <div class="search_form_of_page">
                        <input type="text" placeholder="Get search" name="search" id="search">
                        {{-- <button class="btn btn-secondary">Submit</button> --}}
                    </div>
                    <div class="recent_post_from_page">
                        <h3>All Services</h3>
                        <div class="postReplace">
                        @foreach ($serviceList as $value)
                        <div class="rp_flex">
                            <div class="rp_images">
                                <a href="{{route('servicedetail', $value->slug)}}"><img src="{{Storage::disk('uploads')->url($value->icon)}}" alt="{{$value->title}}"></a>
                            </div>
                            <div class="rp_content">
                                <a href="{{route('servicedetail', $value->slug)}}">{{$value->title}}</a>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
$(document).ready(function(){

    $("#search").on("keyup",function(){
    var value = $(this).val();
    // console.log(value);
    $.ajax({
        'url':"{{ route('service.search') }}",
        'method': "get",
        'data': {search:value},

        success:function(response){

            console.log(response);
            $('.postReplace').replaceWith(response);

        }

    });

  });
});
</script>
