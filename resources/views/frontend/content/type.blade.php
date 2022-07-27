@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<section id="inner_page_header" style="background-image:url({{ asset('frontend/images/1619957642.png') }})" class="text_place">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    <li><a href="{{route('index')}}">Home</a>/</li>
                    <li><a href="{{url()->current()}}">{{$content_type}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="event_wrapper_ew" class="o_padding">
    <div class="container">
        <div class="row">
            @foreach ($content as $value)
            <div class="col-lg-4">
                <div class="event_card_layout feel_animation wow bounceInUp">
                        <div class="event_images_card">
                            <img src="{{Storage::disk('uploads')->url($value->featured_img)}}" alt="{{$value->content_title}}">
                        </div>
                        <div class="event_ec_caption">
                            <a href="{{route('contentdetail', $value->content_url)}}">
                                <h3>{{$value->content_title}}</h3>
                            </a>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
