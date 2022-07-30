@extends('frontend.layouts.app')
@section('meta')
@include('frontend.includes.meta')
@endsection
@section('content')
<section id="infomation_wrapper" class="pt pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="infomation_image wow bounceInLeft" data-wow-duration="1s">
                    <img src="{{@$message->image??asset('frontend/images/noimage.jpg')}}" alt="">
                    <img src="{{ asset('frontend/images/dot-shape.png')}}" alt="" class="dot_shape js-tilt">
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="infomation_detail wow bounceInRight" data-wow-duration="1s">
                    <h2>{{ @$message->content_title }}</h2>
                    <div class="bold-text">
                        <p>
                            {{ @$message->content_page_title }}
                        </p>
                    </div>
                    <p>
                        {!! @$message->content_body !!}
                    </p>
                    {{-- <div class="inform-btn">
                        <a href="#" class="btn btn-warning">Read More</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
