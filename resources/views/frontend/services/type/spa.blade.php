@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
    <section id="inner_page_header" style="background-image:url({{ Storage::disk('uploads')->url($details->image) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a>/</li>
                        <li><a href="#">{{ $details->title }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-end">
                    <div class="header_flex">
                        <ul>
                            <li><a href="#">Service</a>|</li>
                            <li><a href="#">Type</a>|</li>
                            <li><a href="#">{{ $details->title }}</a></li>
                        </ul>
                        <div class="hidden_side_menu">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="spa_cover" class="o_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="spa_content wow bounceInLeft">
                        <h3>{{ $details->title }}</h3>
                        <p>{!! $details->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="spa_cover_images wow bounceInRight">
                        <img src="{{ Storage::disk('uploads')->url($details->image) }}" alt="{{ $details->title }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="spa_style" class="o_buttom_padding">
        <div class="container">

            @foreach ($service as $key => $value)
                @if ($key % 2 == 0)
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <div class="ss_content_images overide_padding_1 feel_animation wow bounceInUp">
                                <img src="{{ Storage::disk('uploads')->url($value->icon) }}" alt="{{ $value->title }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ss_content_area is_padding_right wow bounceInUp">
                                <h3>{{ $value->title }}</h3>
                                <p>{!! $value->content !!}</p>
                                <div>
                                    <a href="{{route('servicedetail',$value->slug)}}" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ss_content_area is_padding_right wow bounceInUp">
                                <h3>{{ $value->title }}</h3>
                                <p>{!! $value->content !!}</p>
                                <div>
                                    <a href="#" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ss_content_images overide_padding_1 feel_animation wow bounceInUp">
                                <img src="{{ Storage::disk('uploads')->url($value->icon) }}" alt="{{ $value->title }}">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <div class="fixed_side_scroll_menu">
        <div class="close_button_ns">
            <i class="las la-times"></i>
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li>

        </ul>
    </div>
@endsection
