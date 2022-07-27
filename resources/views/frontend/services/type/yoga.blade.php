@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<section id="inner_page_header" style="background-image:url('{{ asset('frontend/images/1619957642.png') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul>
                    <li><a href="{{route('index')}}">Home</a>/</li>
                    <li><a href="#">{{$details->title}}</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-end">
                <div class="header_flex">
                    <ul>
                        <li><a href="#">Course</a>|</li>
                        <li><a href="#">Type</a>|</li>
                        <li><a href="#">{{$details->title}}</a></li>
                    </ul>
                    <div class="hidden_side_menu">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about_yoga_cover" class="o_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="site_title wow bounceInDown center">
                    <h3><span>{{$details->title}}</span></h3>
                    <p><i>Take a deep breath, relax and let us take care of you. Join us for a complete mindful
                            experience.</i></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="yogo_picture_area">
                    <div id="yoga_slider" class="owl-carousel">
                        <div>
                            <div class="about_youga_thumbnail wow bounceInDown center">
                                <img src="{{ Storage::disk('uploads')->url($details->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_content wow bounceInDown center" data-wow-delay="0.5s">
                    <p>{!! $details->description !!}</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="content_style">

                </div>
            </div>
        </div>
    </div>
</section>
<section id="yoga_class" class="o_buttom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="site_title wow bounceInDown center">
                    <h3><span>All classes of yoga</span></h3>
                    <p><i>Take a deep breath, relax and let us take care of you. Join us for a complete mindful
                            experience.</i></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="yoga_class_slider" class="owl-carousel">
                    @foreach($courses as $value)
                    <div>
                        <div class="yoga_class_card wow bounceInDown center">
                            <h1>{{$value['title']}}</h1>
                            <div class="yoga_class_images">
                                <img src="{{ Storage::disk('uploads')->url($value->image) }}" alt="{{$value['title']}}">
                            </div>
                            <a href="{{route('courseDetails', $value->slug)}}" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section id="calendar_cover" class="o_buttom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="site_title  wow bounceInDown center">
                    <h3><span>Class Schedule</span></h3>
                    <p><i>Find our different classes sessions</i></p>
                </div>
            </div>
        </div>
        <div class="row  wow bounceInDown center">
            <div class="col-lg-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</section>

<section id="Teachers_cover" class="o_buttom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="site_title  wow bounceInDown center">
                    <h3><span>Our Teachers</span></h3>
                    <p><i>One of the most brilliant souls in their fields, our teachers are here to guide you and assist
                            you through your journey of wellness and mindfulness.</i></p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($teacher as $value)
            <div class="col-lg-3">
                <div class="teacher_thumbnail  wow bounceInDown center">
                    <div class="teacher_card_images">
                        <img src="{{ Storage::disk('uploads')->url($value->image) }}" alt="{{$value->name}}">
                    </div>
                    <div class="teacher_caption">
                        <h4>{{$value->name}}</h4>
                        <p>{{$value->post}}</p>
                        <a href="{{ route('teacher.detail',$value->slug) }}" class="btn btn-link">Read More<i class="las la-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="virtual_studio_wrapper" style="background-image:url('{{ asset('frontend/images/1619958359.jpg') }}')"
    class="wow bounceInDown center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Join us in our virtual studio</h1>
                <a href="#" class="btn btn-secondary">Get membership Now<i class="las la-angle-right"></i></a>
            </div>
        </div>
    </div>
</section>
<section id="priceAndplanning_cover" class="o_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="text-center title-tag">
                    <h3>Pricing & Plans</h3>
                    <p>
                        We have different plans to accommodate your need.
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                <div id="id_planning" class="owl-carousel">
                    @foreach ($priceplan as $plan)
                    <div>
                        <div class="price_plan__o wow bounceInDown center">
                            <div class="icon_images">
                                <img src="{{ asset('frontend/images/d10.png') }}" alt="">
                            </div>
                            <a href="#" class="just_link">{{$plan->plantype->title}}</a>
                            <p>{{$plan->title}}</p>
                            <span>Starting Form {{$plan->offer_price}}</span>
                            <a href="{{ route('booking.form',$plan->slug)}}" class="btn btn-link">Get Now<i class="las la-angle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>

        </div>
    </div>
</section>
<div class="fixed_side_scroll_menu">
    <div class="close_button_ns">
        <i class="las la-times"></i>
    </div>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>

    </ul>
</div>

@endsection
@push('scripts')
<script>
    // full calendar
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        timeZone: 'local',
        events: <?php echo json_encode($calendar) ?>

//         events: [
//     {
//       id: 'a',
//       title: 'my event',
//       start: '2022-02-15',
//       end: '2022-02-21'.+1
//     }
//   ]

    });

    calendar.render();
});
</script>
    
@endpush
