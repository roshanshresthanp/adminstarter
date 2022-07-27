@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
    <!-- Banner -->
<section id="banner_header_wrapper" style="background-image: url({{ Storage::disk('uploads')->url($category->banner_image?? 'banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="bread_crumb_link">
                    <li><a href="{{route('index')}}">Home</a> /</li>
                    <li><a href="#">{{$category->name}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
    <!-- Banner End -->

    <!-- Blog Page -->
    <section id="services_wrapper" class="area_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="site_title">
                        <span>Awards</span>
                        <h1>Awards</h1>
                    </div>
                </div>
            </div>
            <div class="collection_flex">
                @foreach ($awards as $value)
                <div class="collection_thumb">
                    <img src="{{ Storage::disk('uploads')->url($value->image??'noimage.jpg') }}" alt="{{ $value->title }}">
                    <div class="bottom_gallery_caption">
                        <h3>{{ str_limit($value->title ,20)}}</h3>
                        <a class="btn btn-danger" href="{{ route('award-list',$value->slug) }}">Read More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-12"> 
            <div class="d-flex justify-content-center">
            {{ $awards->links() }}
            </div>
        </div>
    </section>
@endsection
