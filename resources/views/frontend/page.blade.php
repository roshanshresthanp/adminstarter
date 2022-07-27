@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<!-- Banner -->
<section class="banner" style="background-image: url({{$data->banner_image??asset('frontend/images/banner.jpg')}});">
	<div class="container">
		<div class="banner-wrap">
			<h1>{{$data->name}}</h1>
		</div>
	</div>
</section>
<!-- Banner End -->


<!-- General Page -->
<section class="general-page mt mb">
	<div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="general-content wow bounceInLeft" data-wow-duration="1s">
                    <div class="page_title">
                        <h3><span>{{$data->page_title }}</span></h3>
                    </div>
                    <p>
                        {!! $data->content !!}
                    </p>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-list">
                    <h3>Recent News</h3>
                    <ul class="blog-posts">
                        @foreach ($recentNews as $item)
                        <li>
                            <div class="blog-post-media">
                                <a href="{{ route('blog-detail',$item->slug) }}"><img src="{{$item->cover_image}}" onerror="this.src='{{ asset('frontend/images/blog.jpg')}}';" alt="images"></a>
                            </div>
                            <div class="blog-post-info">
                                <h3>
                                    <a href="{{ route('blog-detail',$item->slug) }}">{{str_limit($item->title,90) }}
                                    </a>
                                </h3>
                                <span>{{ date('M d, Y',strtotime($item->created_at))}}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <div class="sidebar-list">
                    <h3>Recent Blogs</h3>
                    <ul class="blog-posts">
                        @foreach ($recentBlogs as $item)
                        <li>
                            <div class="blog-post-media">
                                <a href="{{ route('blog-detail',$item->slug) }}"><img src="{{$item->cover_image}}" onerror="this.src='{{ asset('frontend/images/blog.jpg')}}';" alt="images"></a>
                            </div>
                            <div class="blog-post-info">
                                <h3>
                                    <a href="{{ route('blog-detail',$item->slug) }}">{{str_limit($item->title,90) }}
                                    </a>
                                </h3>
                                <span>{{ date('M d, Y',strtotime($item->created_at))}}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


	</div>
</section>
<!-- General Page End -->

@endsection
