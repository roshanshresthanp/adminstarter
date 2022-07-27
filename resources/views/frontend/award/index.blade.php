@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
    <!-- Banner -->
<section id="banner_header_wrapper" style="background-image: url({{ Storage::disk('uploads')->url($award->image??'banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="bread_crumb_link">
                    <li><a href="{{route('index')}}">Home</a> /</li>
                    <li><a href="#">{{$award->title}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
    <!-- Banner End -->

    <!-- Blog Page -->
    <section id="listing_wrapper">
        <div class="container">
            <div class="row">
                @forelse ($award->awards as $data)
                <div class="col-lg-3">
                    <div class="listing_images_thumb">
                        <img src="{{ Storage::disk('uploads')->url($data->cover_image??$data->banner_image??'banner.jpg') }}" alt="">
                        <div class="listing_caption_">
                            <h3>{{str_limit($data->title,35)}}</h3>
                            <a href="{{ route('award-detail',$data->slug)}}" class="btn btn-danger"> View More <i class="las la-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <p style="color: red">No award found</p>
                @endforelse
               
                {{-- <div class="col-lg-3">
                    <div class="listing_images_thumb">
                        <img src="images/g1.jpg" alt="">
                        <div class="listing_caption_">
                            <h3>Angels le lanisa</h3>
                            <a href="#contact_wrapper" class="btn btn-danger">Contact Me <i class="las la-angle-right"></i></a>
                        </div>
                    </div>
    
                </div>
                <div class="col-lg-3">
                    <div class="listing_images_thumb">
                        <img src="images/g1.jpg" alt="">
                        <div class="listing_caption_">
                            <h3>Angels le lanisa</h3>
                            <a href="#contact_wrapper" class="btn btn-danger">Contact Me <i class="las la-angle-right"></i></a>
                        </div>
                    </div>
    
                </div>
                <div class="col-lg-3">
                    <div class="listing_images_thumb">
                        <img src="images/g1.jpg" alt="">
                        <div class="listing_caption_">
                            <h3>Angels le lanisa</h3>
                            <a href="#contact_wrapper" class="btn btn-danger">Contact Me <i class="las la-angle-right"></i></a>
                        </div>
                    </div>
    
                </div>
                <div class="col-lg-3">
                    <div class="listing_images_thumb">
                        <img src="images/g1.jpg" alt="">
                        <div class="listing_caption_">
                            <h3>Angels le lanisa</h3>
                            <a href="#contact_wrapper" class="btn btn-danger">Contact Me <i class="las la-angle-right"></i></a>
                        </div>
                    </div>
    
                </div>
                <div class="col-lg-3">
                    <div class="listing_images_thumb">
                        <img src="images/g1.jpg" alt="">
                        <div class="listing_caption_">
                            <h3>Angels le lanisa</h3>
                            <a href="#contact_wrapper" class="btn btn-danger">Contact Me <i class="las la-angle-right"></i></a>
                        </div>
                    </div>
    
                </div>
                <div class="col-lg-3">
                    <div class="listing_images_thumb">
                        <img src="images/g1.jpg" alt="">
                        <div class="listing_caption_">
                            <h3>Angels le lanisa</h3>
                            <a href="#contact_wrapper" class="btn btn-danger">Contact Me <i class="las la-angle-right"></i></a>
                        </div>
                    </div>
    
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Blog Page End -->
@endsection
