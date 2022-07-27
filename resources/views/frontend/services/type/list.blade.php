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
                    <li><a href="{{route('index')}}">Home</a>/</li>
                    <li><a href="#">{{$details->title}}</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-end">
                <div class="header_flex">
                    <ul>
                        <li><a href="#">Service</a>|</li>
                        <li><a href="#">Type</a>|</li>
                        <li><a href="#">{{$details->title}}</a></li>
                    </ul>
                    <div class="hidden_side_menu">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="Teachers_cover" class="o_buttom_padding mt-4">
    <div class="container">
        <div class="row">
            @foreach ($service as $value)
            <div class="col-lg-3">
                <div class="teacher_thumbnail  wow bounceInDown center" style="visibility: visible; animation-name: bounceInDown;">
                    <div class="teacher_card_images">
                        <img src="http://127.0.0.1:8000/uploads/team_image/HD7Un4dLVCD1gp8rjDZP72Z1sRbhuVb9ykufu3JG.jpg" alt="">
                    </div>
                    <div class="teacher_caption">
                        <h4>{{$value->title}}</h4>
                        <p>{{$service_cat->title}}</p>
                        <a href="{{route('servicedetail', $value->slug)}}" class="btn btn-link">Read More<i class="las la-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
