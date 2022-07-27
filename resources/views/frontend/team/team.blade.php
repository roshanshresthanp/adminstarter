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

<!-- Team Page -->
<section class="team-page mt">
    <div class="container">
        <div class="main-title">
            <span class="title-pattern"><i class="fa fa-bar-chart"></i></span>
        </div>
        <div class="row">
            @foreach ($teams as $team)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="team-wrap">
                    <div class="team-img">
                        {{-- <a href="/dasda"> --}}
                        <img src="{{ $team->image}}" onerror="this.src='{{asset('frontend/images/img_avatar.png')}}';" alt="images">
                        {{-- </a> --}}
                        {{-- <div class="social-media">
                            <ul>
                                <li><a target="_blank" href="{{ $team->facebook }}"><i class="lab la-facebook-f"></i></a></li>
                                <li><a target="_blank" href="{{ $team->twitter }}"><i class="lab la-twitter"></i></a></li>
                                <li><a target="_blank" href="{{ $team->linkedin }}"><i class="lab la-linkedin-in"></i></a></li>
                                <li><a target="_blank" href="{{ $team->youtube }}"><i class="lab la-youtube"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="team-content">
                        <a href="{{ route('team.detail',$team->slug) }}">
                    <span>{{ $team->name}}</span>
                        <p>{{ $team->team->name }}</p>
                      </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Team Page End -->
@endsection
