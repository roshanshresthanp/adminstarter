@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')

    <!-- banner section  -->
    <section id="site_banner"
        style="background-image: url({{ $setting->home_bg_img ?? asset('frontend/images/4.jpg') }});">
        <div id="site_banner_wrapper" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="banner_caption">
                                        {{-- <span>Online Education Course</span> --}}
                                        <h2>{{ $slider->title }}</h2>
                                        <p>
                                            {{ $slider->sub_title }}
                                        </p>
                                        <div class="main-btn">
                                            <a href="{{ url('/contact') }}" class="btn btn-warning">Contact</a>
                                            <a href="#enroll_wrapper" class="btn btn-warning">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="banner-img wow bounceInRight" data-wow-duration="2s">
                                        <img src="{{ $slider->location }}" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#site_banner_wrapper" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#site_banner_wrapper" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- banner section End -->

    <!-- Course Option -->
    <div class="course_option">
        <div class="flex_box_fb">
            <div class="features-wrap wow bounceInLeft" data-wow-duration="1s">
                <div class="content_part">
                    <h4 class="title_tt">
                        <span class="watermark_ww">{{ $setting->first_main_title }}</span>
                    </h4>
                    <p class="dese_dd">
                        {{ $setting->first_sub_title }}
                    </p>
                </div>
            </div>
            <div class="features-wrap wow bounceInDown center" data-wow-duration="1.5s">
                <div class="content_part">
                    <h4 class="title_tt">
                        <span class="watermark_ww">{{ $setting->second_main_title }}</span>
                    </h4>
                    <p class="dese_dd">
                        {{ $setting->second_sub_title }}
                    </p>
                </div>
            </div>
            <div class="features-wrap wow bounceInUp center" data-wow-duration="1.8s">
                <div class="content_part">
                    <h4 class="title_tt">
                        <span class="watermark_ww">{{ $setting->third_main_title }}</span>
                    </h4>
                    <p class="dese_dd">
                        {{ $setting->third_sub_title }}
                    </p>
                </div>
            </div>
            <div class="features-wrap wow bounceInRight" data-wow-duration="1s">
                <div class="content_part">
                    <h4 class="title_tt">
                        <span class="watermark_ww">{{ $setting->fourth_main_title }}</span>
                    </h4>
                    <p class="dese_dd">
                        {{ $setting->fourth_sub_title }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Course Option End -->

    <!-- information section  -->
    <section id="infomation_wrapper" class="mt mb">
        <div class="container">
            @isset($messages)
                <div class="owl-carousel message_carousel">
                    @foreach ($messages as $message)
                        <div class="row">
                            <div class="col-lg-5 col-md-12">
                                <div class="infomation_image wow bounceInLeft" data-wow-duration="1s">
                                    <img src="{{ $message->featured_img }}"
                                        onerror="this.src='{{ asset('frontend/images/noimage.jpg') }}';" alt="">
                                    <img src="{{ asset('frontend/images/dot-shape.png') }}" alt="" class="dot_shape js-tilt">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12">
                                <div class="infomation_detail wow bounceInRight" data-wow-duration="1s">
                                    <h2>{{ $message->content_title }}</h2>
                                    <div class="bold-text">
                                        <p>
                                            {{ $message->content_page_title }}
                                        </p>
                                    </div>
                                    <p>
                                        {!! str_limit($message->content_body, 600) !!}
                                    </p>
                                    <div class="inform-btn">
                                        <a href="{{ route('message', $message->content_url) }}" class="btn btn-warning">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
    </section>
    </div>
    <!-- information section ENd -->

    <!-- notice board and news  -->
    <section id="notice_board_and_event" class="pt pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="section_header">
                        <h1>
                            <i class="las la-book"></i> {{$setting->news_main_title}}
                        </h1>
                        <a href="{{ route('list','news')}}">View More <i class="las la-arrow-right"></i></a>
                    </div>
                    <div class="tab_content_wrapper">
                        <marquee direction="up" behavior="alternate" height="100%" onMouseOver="this.stop()"
                            onMouseOut="this.start()">
                            <ul class="ns_news_listing">
                                @foreach ($news as $new)
                                    <li>
                                        <div>
                                            <div class="news_photo"><a href="{{ route('blog-detail', $new->slug) }}">
                                                    <img src="{{ $new->cover_image }}"
                                                        onerror="this.src='{{ asset('frontend/images/noimage.jpg') }}';"
                                                        alt="{{ $new->title }}"></a>
                                            </div>
                                        </div>
                                        <div>
                                            <h4><a href="{{ route('blog-detail', $new->slug) }}">{{ $new->title }}</a>
                                            </h4>
                                            {!! str_limit(strip_tags($new->description), 150) !!}
                                            <span>Published date:
                                                {{ date('Y-m-d', strtotime($new->created_at)) }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </marquee>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="section_header">
                        <h1><i class="las la-bell"></i>{{$setting->news_sub_title}}</h1>
                        {{-- <a href="#">View More <i class="las la-arrow-right"></i></a> --}}
                        <a href="{{ route('list','notice')}}">View More <i class="las la-arrow-right"></i></a>

                    </div>
                    <div class="tab_content_wrapper">
                        <marquee direction="up" behavior="alternate" height="100%" onMouseOver="this.stop()"
                            onMouseOut="this.start()">
                            <ul class="ns_news_listing">
                                @foreach ($notices as $notice)
                                    <li>
                                        <div>
                                            <h4><a
                                                    href="{{ route('blog-detail', $notice->slug) }}">{{ $notice->title }}</a>
                                            </h4>
                                            <a
                                                href="{{ route('blog-detail', $notice->slug) }}">{!! str_limit(strip_tags($notice->description), 150) !!}</a>
                                            <span>Published date:
                                                {{ date('Y-m-d', strtotime($notice->created_at)) }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- notice board and news End -->

    <!-- why choose us  -->
    @isset($adv)
        <section id="why_choose_us" class="mt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="section_header">
                            <h1>{{ $adv->content_title }}</h1>
                            <p>{{ $adv->content_page_title }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 wow rollIn" data-wow-duration="1s">
                        <div class="row">
                            @foreach ($features as $item)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-provide">
                                        <div class="single-provide-icons">
                                            <img src="{{ $item->image }}" alt="">
                                        </div>
                                        <div class="single-provide-contented">
                                            <a href="{{ route('feature.detail',$item->slug) }}">
                                                <h4>{{ $item->title }}</h4>
                                                <p>{!! str_limit($item->description, 100) !!}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow lightSpeedIn" data-wow-duration="1s">
                        <div class="provider_images">
                            <img src="{{ $adv->featured_img ?? asset('frontend/images/porvide-01.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
    <!-- why choose us ENd -->

    <!-- Programmes -->
    <section id="program_equipped" class="pt pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="section_header">
                        <h1>{{ $setting->course_main_title }}</h1>
                        <p>{{ $setting->course_sub_title }}</p>
                    </div>
                </div>
                <div class="col-lg-12">

                    <ul class="nav nav-pills course_listing" id="pills-tab" role="tablist">
                        @foreach ($courseCats as $cat)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link @if ($loop->first) active @endif"
                                    id="pills-{{ $cat->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $cat->id }}" type="button" role="tab"
                                    aria-controls="pills-{{ $cat->id }}"
                                    aria-selected="true">{{ $cat->title }}</button>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($courseCats as $cat)
                            <div class="tab-pane fade show @if ($loop->first) active @endif"
                                id="pills-{{ $cat->id }}" role="tabpanel"
                                aria-labelledby="pills-{{ $cat->id }}-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="owl-carousel course_carousel">
                                            @forelse ($cat->course as $course)
                                                <div class="item wow bounceInDown center" data-wow-duration="1s">
                                                    <div class="course_thumbnail_wrap">
                                                        {{-- <a href="#">
                                            <div class="course_head">
                                                <img src="{{$course->cover_image}}" alt="">
                                            </div>
                                        </a> --}}
                                                        <a href="{{ route('course.detail', $course->slug) }}">
                                                            <div class="course_middle">
                                                                <h2>{{ $course->title }}</h2>
                                                            </div>
                                                        </a>
                                                        <a href="{{ route('course.detail', $course->slug) }}">
                                                            <div class="course_date_other">
                                                                <span><i class="las la-hourglass-start"></i>
                                                                    {{ $course->duration }}</span>
                                                                <span><i class="las la-clock"></i>
                                                                    {{ $course->semester }}</span>
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

    <!-- number roll  -->
    {{-- @isset($whyUs)
        <section id="number_roll_wrapper" class="mt mb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="section_header">
                            <h1>{{ $whyUs->content_title }}</h1>
                            <p>{{ $whyUs->content_page_title }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="count_number_box">
                            <span>{{ $setting->learner_sub_title }}</span>
                            <span class="counter">{{ $setting->total_learner }}</span>
                        </div>
                        <div class="learn_wrap">
                            <p>{{ $setting->learner_main_title }}</p>
                        </div>
                        <div class="over_fifty_cover">
                            <span>{{ $setting->nationality_sub_title }}</span>
                            <span class="counter">{{ $setting->total_nationality }}</span>
                            <p>{{ $setting->nationality_main_title }}</p>
                        </div>
                        <div class="flex_in_box">
                            <div class="over_fifty_cover in_green">
                                <span>{{  $setting->activity_sub_title  }}</span>
                                <span class="counter">{{ $setting->total_activity }}</span>
                                <p>{{  $setting->activity_main_title  }}</p>
                                <p>{{  $setting->activity_submain_title  }}</p>
                            </div>
                            <div class="extra_activity">
                                <p>{{  $setting->from_title  }}</p>
                                <h6>{{  $setting->anywhere_title  }}</h6>
                                <div class="to_wrap">
                                    <span>{{  $setting->to_title  }}</span>
                                </div>
                                <span>{{  $setting->distance_learning_title  }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="roll_images wow bounceInRight" data-wow-duration="1s">
                            <img src="{{ $whyUs->featured_img ?? asset('frontend/images/img3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset --}}
    <!-- number roll End -->

    <!-- student workflow -->
    <section id="work_flow_wrapper" class="mt mb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="section_header">
                        <h1>{{ $setting->blog_main_title }}</h1>
                        <p>{{ $setting->blog_sub_title }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $key => $item)
                    @if ($loop->first)
                        <div class="col-lg-7 col-md-6">
                            <div class="sliver_wrapper wow bounceInLeft" data-wow-duration="1s">
                                <img src="{{ $item->cover_image }}" alt="">
                                <h2>{{ $item->title }}</h2>
                                <div class="on_hover_view">
                                    <h2>{{ $item->title }}</h2>
                                    <p><a href="{{ route('blog-detail', $item->slug) }}">{!! strip_tags(str_limit($item->description, 300)) !!} </a></p>
                                    <a href="{{ route('blog-detail', $item->slug) }}">Read More <i
                                            class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @elseif($key == 1)
                        <div class="col-lg-5 col-md-6">
                            <div class="sliver_wrapper wow bounceInRight" data-wow-duration="1s">
                                <img src="{{ $item->cover_image }}" alt="">
                                <h2>{{ $item->title }}</h2>
                                <div class="on_hover_view">
                                    <h2>{{ $item->title }}</h2>
                                    <p><a href="{{ route('blog-detail', $item->slug) }}">{!! strip_tags(str_limit($item->description, 200)) !!} </a></p>
                                    <a href="{{ route('blog-detail', $item->slug) }}">Read More <i
                                            class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @elseif($key == 2)
                        <div class="col-lg-5 col-md-6">
                            <div class="sliver_wrapper wow bounceInLeft" data-wow-duration="1s">
                                <img src="{{ $item->cover_image }}" alt="">
                                <h2>{{ $item->title }}</h2>
                                <div class="on_hover_view">
                                    <h2>{{ $item->title }}</h2>
                                    <p><a href="{{ route('blog-detail', $item->slug) }}">{!! strip_tags(str_limit($item->description, 200)) !!} </a></p>
                                    <a href="{{ route('blog-detail', $item->slug) }}">Read More <i
                                            class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @elseif($key == 3)
                        <div class="col-lg-7 col-md-6">
                            <div class="sliver_wrapper wow bounceInRight" data-wow-duration="1s">
                                <img src="{{ $item->cover_image }}" alt="">
                                <h2>{{ $item->title }}</h2>
                                <div class="on_hover_view">
                                    <h2>{{ $item->title }}</h2>
                                    <p><a href="{{ route('blog-detail', $item->slug) }}">{!! strip_tags(str_limit($item->description, 300)) !!} </a></p>
                                    <a href="{{ route('blog-detail', $item->slug) }}">Read More <i
                                            class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <!-- student workflow ENd -->
    
    <!-- .enroll wrapper -->
    @isset($enroll)
        <section id="enroll_wrapper" class="pt pb" style="background-image: url({{ $enroll->freezone_img }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="enroll-wrappers">
                            <div class="header_right_side wow rollIn" data-wow-duration="1s">
                                <h2>{{ $enroll->content_title ?? $enroll->content_page_title }}</h2>
                                <p>{!! str_limit(strip_tags($enroll->content_body), 250) !!}

                                </p>
                                {{-- <p>Share your details and we'll get back to you.</p> --}}

                            </div>
                            <form action="{{ route('enroll.save') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="enroll_form wow bounceInDown center" data-wow-duration="2s">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <select class="form-select form-control" name="course_id"
                                                    aria-label="Default select example">
                                                    <option value="">Select course applying for*</option>
                                                    @foreach ($courseCats as $item)
                                                        <option class="select-title" disabled="" value="">
                                                            {{ $item->title }}
                                                        </option>
                                                        @foreach ($item->course as $course)
                                                            <option value="{{ $course->id }}">{{ $course->title }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 m-auto">
                                            <div class="mb-3">
                                                <input type="text" name="contact" value="{{ old('contact') }}"
                                                    class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Enter mobile number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-warning">Enroll Now </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="testimonial_wrapper wow bounceInRight" data-wow-duration="2s">
                            <div class="testi-title">
                                <h2>Testimonial</h2>
                            </div>
                            <div class="owl-carousel testimonial_carousel">
                                @foreach ($testimonials as $test)
                                    <div class="item">
                                        <div class="testimonial_images">
                                            <img src="{{ $test->image }}"
                                                onerror="this.src='{{ asset('frontend/images/noimage.jpg') }}';" alt="">
                                        </div>
                                        <div class="testimonial_description">
                                            <span> {{ $test->staff_name }} </span>
                                            <span>{{ $test->staff_position }}</span>
                                            <p>
                                                {!! str_limit(strip_tags($test->message), 200) !!}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shapes">
                    <div class="shape xllarge shape1"></div>
                    <div class="shape xlarge shape1"></div>
                    <div class="shape large shape1"></div>
                    <div class="shape medium shape1"></div>
                    <div class="shape small shape1"></div>
                </div>
            </div>
        </section>
    @endisset
    <!-- .enroll wrapper END -->

    <!-- knowledge partner -->
    <section id="knowledge_partner_wrapper" class="mt">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="section_header">
                        <h1>{{ $setting->partner_main_title }}</h1>
                        <p>{{ $setting->partner_sub_title }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-carousel knowledge_carousel">
                    @foreach ($partners as $key => $p)
                        <div class="item wow bounceInDown center" data-wow-duration="1.{{ $key }}s">
                            <div class="item_knowledge_logo">
                                <img src="{{ $p->partner_logo }}"
                                    onerror="this.src='{{ asset('frontend/images/noimage.jpg') }}';"
                                    alt="{{ $p->partner_name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- knowledge partner END -->
@endsection
