@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')

<!-- Banner -->
<section class="banner" style="background-image: url({{$category->banner_image??asset('frontend/images/banner.jpg')}});">
	<div class="container">
		<div class="banner-wrap">
			<h1>{{ $category->page_title }}</h1>
		</div>
	</div>
</section>
<!-- Banner End -->

<!-- Gallery -->
<section class="gallery mt mb">
	<div class="container">
		<div class="row">
            @foreach ($albums as $item)
            <div class="col-lg-4 col-md-6">
				<div class="gallery-wrap wow rollIn" data-wow-duration="1s">
					<div class="gallery">
						<div class="gallery-media">
							<a href="{{ route('image',$item->title_slug) }}"><img src="{{$item->album_cover}}" onerror="this.src='{{ asset('frontend/images/gallery.jpg')  }}';" alt="images"></a>
						</div>
						<div class="gallery-info">
							<h3><a href="{{ route('image',$item->title_slug) }}"> {{ $item->album_title }}</a></h3>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</section>
@endsection
