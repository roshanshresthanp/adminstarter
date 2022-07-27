@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<!-- Banner -->
{{-- <section class="banner" style="background-image: url({{ $feature->banner_image??asset('frontend/images/banner.jpg') }});">
	<div class="container">
		<div class="banner-wrap">
			<h1>Blog / {{ $feature->title }}</h1>
		</div>
	</div>
</section> --}}
<!-- Banner End -->

<!-- Blog Details -->
<section class="blog-details mt mb">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div class="blog-details-main wow bounceInLeft"  style="overflow-x: hidden" data-wow-duration="1s">
					<h2>{{ $feature->title }}</h2>
					{{-- <ul class="meta-tag">
						<li><i class="las la-user"></i>{{$feature->posted_by??'Admin'}}</li>
						<li><i class="las la-calendar-check"></i>{{ date('M d, Y',strtotime($feature->created_at))}}</li>
					</ul> --}}
					{{-- <div class="featured-img ">
						<img src="{{ $feature->image}}" onerror="this.src='{{asset('frontend/images/blog.jpg')}}';" alt="images">


                    </div> --}}

					<p>
                        {!! $feature->description !!}
                    </p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="blog-sidebar wow bounceInRight" data-wow-duration="1s">
{{--
                   @if($feature->blog_type=='Blog')
                    <div class="sidebar-list">
						<h3>Categories</h3>
						<ul class="blog-lists">
                            @foreach($featureCats as $cat)
							<li><a href="{{ route('catBlog',$cat->slug) }}">{{ $cat->title }}</a></li>
                            @endforeach
						</ul>
					</div>
                    @endif --}}

                    <div class="sidebar-list">
						<h3>Other Features</h3>
						<ul class="blog-posts">
                            @foreach ($otherFeatures as $item)
                            <li>
								<div class="blog-post-media">
									<a href="{{ route('blog-detail',$item->slug) }}"><img src="{{$item->image}}" onerror="this.src='{{ asset('frontend/images/blog.jpg')}}';" alt="images"></a>
								</div>
								<div class="blog-post-info">
									<h3>
										<a href="{{ route('feature.detail',$item->slug) }}">{{str_limit($item->title,90) }}
										</a>
									</h3>
									{{-- <span>{{ date('M d, Y',strtotime($item->created_at))}}</span> --}}
								</div>
							</li>
                            @endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Details End -->
@endsection
@push('scripts')
@endpush
