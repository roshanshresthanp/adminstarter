@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<!-- Banner -->
{{-- <section class="banner" style="background-image: url({{$team->banner_image??asset('frontend/images/banner.jpg') }});">
	<div class="container">
		<div class="banner-wrap">
			<h1>Team / {{ $team->name }}</h1>
		</div>
	</div>
</section> --}}
<!-- Banner End -->
<!-- Team Details Page -->
<section class="team-details mt">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="{{ $team->image }}" onerror="this.src='{{ asset('frontend/images/img_avatar.png') }}';" alt="images">
                        {{-- <div class="social-media">
                            <ul>
                                <li><a target="_blank" href="{{ $team->facebook }}"><i class="lab la-facebook-f"></i></a></li>
                                <li><a target="_blank" href="{{ $team->twitter }}"><i class="lab la-twitter"></i></a></li>
                                <li><a target="_blank" href="{{ $team->linkedin }}"><i class="lab la-linkedin-in"></i></a></li>
                                <li><a target="_blank" href="{{ $team->youtube }}"><i class="lab la-youtube"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="team-details-content">
                    <h2>{{ $team->name }}</h2>
                    <span>{{ $team->team->name }}</span>
                    <p>
                   {!! $team->content !!}
                    </p>

                    <ul class="td-contact">
                        <li>
                            <i class="las la-mobile"></i>
                            <b>{{ $team->phone }}</b>
                        </li>
                        <li>
                            <i class="las la-envelope-open-text"></i>
                            <b>{{ $team->email }}</b>
                        </li>
                        <li>
                            <i class="las la-map-marked"></i>
                            <b>{{ $team->address }}</b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Details Page End -->
@endsection
