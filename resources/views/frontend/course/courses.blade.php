@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@push('styles')
@endpush
@section('content')
    <!-- Banner -->
    <section class="banner" style="background-image: url({{$category->banner_image??asset('frontend/images/banner.jpg')}});">
        <div class="container">
            <div class="banner-wrap">
                <h1>{{$category->name}}</h1>
            </div>
        </div>
    </section>
    <!-- Banner End -->
<!-- Programmes -->
<section id="program_equipped" class="pt pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="section_header">
                    <h1>{{$setting->course_main_title}}</h1>
                    <p>{{$setting->course_sub_title}}</p>
                </div>
            </div>
            <div class="col-lg-12">

                <ul class="nav nav-pills course_listing" id="pills-tab" role="tablist">
                    @foreach ($courseCats as $cat)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif" id="pills-{{ $cat->id }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ $cat->id }}" type="button" role="tab" aria-controls="pills-{{ $cat->id }}"
                        aria-selected="true">{{ $cat->title }}</button>
                    </li>
                    @endforeach
                </ul>

            <div class="tab-content" id="pills-tabContent">
                @foreach ($courseCats as $cat)

                    <div class="tab-pane fade show @if($loop->first) active @endif" id="pills-{{ $cat->id }}" role="tabpanel"
                    aria-labelledby="pills-{{ $cat->id }}-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="owl-carousel course_carousel">
                                @forelse ($cat->course as $course)
                                <div class="item wow bounceInDown center" data-wow-duration="1s">
                                    <div class="course_thumbnail_wrap">
                                        <a href="{{ route('course.detail',$course->slug)}}">
                                            <div class="course_middle">
                                                <h2>{{$course->title}}</h2>
                                            </div>
                                        </a>
                                        <a href="{{ route('course.detail',$course->slug)}}">
                                            <div class="course_date_other">
                                                <span><i class="las la-hourglass-start"></i> {{ $course->duration }}</span>
                                                <span><i class="las la-clock"></i> {{ $course->semester }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @empty
                                    <p style="text-align: center;color:red">No course found</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
<!-- Programmes End -->
<section class="general-page mt mb">
	<div class="container">
		<div class="general-content wow bounceInLeft" data-wow-duration="1s">
			{{-- <h3>{{$category->page_title }}</h3> --}}
			<p>
                {!! $category->content !!}
			</p>

		</div>
	</div>
</section>
<!-- General Page End -->
@endsection
@push('scripts')
@endpush
