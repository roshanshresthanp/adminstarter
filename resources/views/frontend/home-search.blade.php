@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<!-- Banner -->
<section class="banner" style="background-image: url({{asset('frontend/images/banner.jpg')}});">
	<div class="container">
		<div class="banner-wrap">
			<h1>Search Result</h1>
		</div>
	</div>
</section>
<!-- Banner End -->


<!-- Blog Page -->
<section class="blog-page mt mb">
	<div class="container">
		<div class="row">
            @forelse($courses as $item)
            <div class="col-lg-4 col-md-6">
				<div class="blog-page-wrap wow bounceInLeft" data-wow-duration="1s">
					<div class="blog-page-media">
						<a href="{{ route('course.detail',$item->slug) }}"><img src="{{$item->cover_image??asset('frontend/images/course.jpg')}}" alt="images"></a>
					</div>
					<div class="blog-page-info">
						<h3><a href="{{ route('course.detail',$item->slug) }}">{{str_limit($item->title,70) }}</a></h3>
						{{-- <ul class="meta-tag">
							<li><i class="las la-user"></i> {{$item->posted_by??'Admin'}}</li>
							<li><i class="las la-calendar-check"></i> {{ date('M d, Y',strtotime($item->created_at))}}</li>
						</ul> --}}
					</div>
				</div>
			</div>
            @empty
            <p class="text-center" style="color: red">No result found</p>
            @endforelse
		{{-- <nav aria-label="...">
			<ul class="pagination">
                {{ $blogs->links() }}
			</ul>
		</nav> --}}
	</div>
</section>
<!-- Blog Page End -->
@endsection
