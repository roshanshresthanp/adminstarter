@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@push('styles')
@endpush
@section('content')
    <!-- Banner -->
    <section class="banner" style="background-image: url({{@$course->banner_image??asset('frontend/images/banner.jpg')}});">
        <div class="container">
            <div class="banner-wrap">
                <h1>Course / {{@$course->title}}</h1>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Blog Details -->
    <section class="blog-details mt mb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="blog-details-main wow bounceInLeft" data-wow-duration="1s">
                        <h2>{{ @$course->title }}</h2>
                        <div class="featured-img">
                            <img src="{{@$course->cover_image}}" onerror="this.src='{{ asset('frontend/images/course.jpg') }}';" alt="images">
                        </div>
                        <p>{!! @$course->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog-sidebar wow bounceInRight" data-wow-duration="1s">
                        <div class="sidebar-list">
                            <h3>Course Overview</h3>
                            <ul class="course-overview-lists">
                                <li>
                                    <span>Level</span>
                                    <b>{{ @$course->category->title }}</b>
                                </li>
                                <li>
                                    <span>Duration</span>
                                    <b>{{ @$course->duration }}</b>
                                </li>
                                <li>
                                    <span>Total Semester</span>
                                    <b>{{ @$course->semester }}</b>
                                </li>
                                {{-- <li>
                                    <span>Program Code</span>
                                    <b>Ba</b>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="sidebar-list">
                            <h3>Similar Courses</h3>
                            <ul class="blog-posts">
                                @foreach ($relatedCourses as $item)
                                <li>
                                    <div class="blog-post-media">
                                        <a href="#"><img src="{{$item->cover_image}}" onerror="this.src='{{ asset('frontend/images/course.jpg') }}';"  alt="images"></a>
                                    </div>
                                    <div class="blog-post-info">
                                        <h3>
                                            <a href="{{ route('course.detail',$item->slug) }}">{{ $item->title }}
                                            </a>
                                        </h3>
                                        <span><i class="las la-clock"></i> {{ $item->duration??$item->semester}}</span>
                                    </div>
                                </li>
                                @endforeach

                                {{-- <li>
                                    <div class="blog-post-media">
                                        <a href="#"><img src="images/s2.jpg" alt="images"></a>
                                    </div>
                                    <div class="blog-post-info">
                                        <h3>
                                            <a href="#">B.Sc. Microbiology Students Learning About School
                                            </a>
                                        </h3>
                                        <span>April 9, 2022</span>
                                    </div>
                                </li> --}}

                                {{-- <li>
                                    <div class="blog-post-media">
                                        <a href="#"><img src="images/s5.jpg" alt="images"></a>
                                    </div>
                                    <div class="blog-post-info">
                                        <h3>
                                            <a href="#">B.Sc. Microbiology Students Learning About School
                                            </a>
                                        </h3>
                                        <span>April 9, 2022</span>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="sidebar-list">
                            <h3>Apply Now</h3>
                            <form action="{{ route('enroll.save') }}" method="post">
                                @csrf
                                <input type="hidden" name="course_id" value="{{$course->id}}" class="form-control" readonly>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="contact" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" name="message" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <button type="submit">Submit</button>
                            </form>
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
