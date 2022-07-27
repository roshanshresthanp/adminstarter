@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<!-- Banner -->
<section class="banner" style="background-image: url({{$image->banner_image??asset('frontend/images/banner.jpg')}});">
	<div class="container">
		<div class="banner-wrap">
			<h1>Album / {{ $image->album_title }}</h1>
		</div>
	</div></section>
<!-- Banner End -->

<!-- Gallery -->
<section class="gallery-details mt mb">
	<div class="container">
		<ul id="image-gallery" class="gallery list-unstyled cS-hidden row">
            @foreach ($image->image as $item)
            <li data-src="{{$item->album_images??asset('frontend/images/gallery.jpg')}}" onerror="this.src='{{ asset('frontend/images/gallery.jpg')}}';" class="col-lg-4 col-md-6 wow rollIn" data-wow-duration="1s">
				<div class="gallery-details-media">
					<img src="{{$item->album_images??asset('frontend/images/gallery.jpg') }}" onerror="this.src='{{ asset('frontend/images/gallery.jpg')}}';" alt="images">
					{{-- <h3>Grand Finale of Public Speaking and EMCEE Training</h3> --}}
				</div>
			</li>
            @endforeach
		</ul>
	</div>
</section>
<!-- Gallery End -->
@endsection

