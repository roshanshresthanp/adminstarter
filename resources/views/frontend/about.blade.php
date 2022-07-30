@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<!-- Banner -->
<section class="banner" style="background-image: url({{$category->banner_image??asset('frontend/images/banner.jpg')}});">
	<div class="container">
		<div class="banner-wrap">
			<h1>{{ $category->name }}</h1>
		</div>
	</div>
</section>
<!-- Banner End -->
<!-- About Us -->
<section class="about-us mt mb">
	<div class="container">
		<div class="about-content wow bounceInLeft" data-wow-duration="1s">
			<h3>{{ $category->page_title }}</h3>
			<p>
				{!! $category->content !!}
			</p>
		</div>
        @foreach($abouts as $item)
        @if($loop->odd)
        <div class="about-list">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="about-list-media wow bounceInLeft" data-wow-duration="1s">
						<img src="{{$item->image??$item->banner_image}}" alt="images">
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="about-list-info wow bounceInRight" data-wow-duration="1s">
						<h3>{{ $item->content_title??$item->content_page_title }}</h3>
						<p>
                            {!! str_limit(strip_tags($item->content_body),800) !!}
						</p>
					</div>
				</div>
			</div>
		</div>
        @else
		<div class="about-list">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="about-list-media wow bounceInRight" data-wow-duration="1s">
						<img src="{{ $item->image??$item->banner_img }}" alt="images">
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="about-list-info wow bounceInLeft" data-wow-duration="1s">
						<h3>{{ $item->content_title??$item->content_page_title }}</h3>
						<p>
                            {!! str_limit(strip_tags($item->content_body),800) !!}
						</p>
					</div>
				</div>
			</div>
		</div>
        @endif
        @endforeach
	</div>
</section>
<!-- About Us End -->
@endsection
