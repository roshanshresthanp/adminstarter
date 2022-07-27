<div class="blink-btn-wrapper">
    @isset($admissionform)
    <div class="blink-btn">
        {{-- <a href="#">Apply <span>Now!</span></a> --}}
        <a target="_blank" href="{{ route('admission.form') }}">{{ $admissionform->content_title }}</a>
    </div>
    @endisset
    @isset($inquiryform)
    <div class="blink-btn">
        {{-- <a href="#">Inquiry <span>Now!</span></a> --}}
        <a target="_blank" href="{{ route('inquiry.form') }}"><span>{{ $inquiryform->content_title }}</span></a>
    </div>
    @endisset
    @isset($registrationform)
            <div class="blink-btn">
                {{-- <a href="#">Inquiry <span>Now!</span></a> --}}
                <a target="_blank" href="{{ route('registration.form') }}"><span>{{ $registrationform->content_title }}</span></a>
            </div>
        @endisset
</div>
<div class="header-top">
    <div class="container">
        <div class="th-wrap">
            <div class="th-left">
                <ul>
                    <li><a href="tel:{{$setting->contact_no }} "><i class="las la-tty"></i> {{$setting->contact_no }} </a></li>
                    <li><a href="mailto:{{$setting->email }} "><i class="las la-envelope-open-text"></i> {{$setting->email }}</a></li>
                </ul>
            </div>
            <div class="the_wrapper">
                <div class="th-right">
                    <ul>
                        <li class="facebook"><a target="_blank" href="{{$setting->facebook}}"><i class="lab la-facebook-f"></i></a></li>
                        <li class="twitter"><a target="_blank" href="{{$setting->twitter}}"><i class="lab la-twitter"></i></a></li>
                        <li class="linkedin"><a target="_blank" href="{{$setting->linkedin}}"><i class="lab la-linkedin-in"></i></a></li>
                        <li class="instagram"><a target="_blank" href="{{$setting->instagram}}"><i class="lab la-instagram"></i></a></li>
                        <li class="youtube"><a target="_blank" href="{{$setting->youtube}}"><i class="lab la-youtube"></i></a></li>
                    </ul>


                </div>
                {{-- <div class="apply-btn">
                    <a href="#">Apply Online <i class="las la-clipboard-check"></i></a>
                    <ul class="apply-drop">

                        <li><a @if(request()->routeIs('index')) href="#enroll_wrapper"  @else href="{{ url('/') }}/#enroll_wrapper"  @endif >Enroll Course</a> </li>

                            @isset($admissionform)
                            <li><a target="_blank" href="{{ route('admission.form') }}">{{ $admissionform->content_title }}</a></li>
                            @endisset

                            @isset($inquiryform)
                            <li><a target="_blank" href="{{ route('inquiry.form') }}">{{ $inquiryform->content_title }}</a></li>
                            @endisset
                    </ul>
                </div> --}}
            </div>

        </div>

    </div>
</div>

<header id="header">
    <div class="container">
        <div class="h-wrap">
            <div class="logo">
                <a class="navbar-brand" href="{{route('index')}}">
                    <img src="{{ $setting->company_logo }}" alt="logo">
                    <span class="logo-caption">Nepal Information <b>Technology</b></span>
                </a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="navigation_bar">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Teaching & Learning</a>
                        </li> --}}
                        @foreach($headerMenu as $menu)
                        <li class="nav-item @if(count($menu->children)) dropdown @endif">
                            <a class="nav-link @if(count($menu->children)) dropdown-toggle @endif" @if($menu->category_slug =="page") href="{{ $menu->external_link??route('page', $menu->title_slug)}}" @elseif($menu->category_slug =="message" || $menu->category_slug =="course") href="{{ $menu->external_link??route('courseAndMessage', [$menu->category_slug,$menu->content_slug])}}"  @else href="{{$menu->external_link??route('category',$menu->category_slug)}}" @endif @if(count($menu->children))  id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" @endif >
                            {{ $menu->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- <li class="sub-menu">
                                    <a class="dropdown-item" href="#">Message From Chairman</a>
                                        <ul class="dropdown-menu sub-dropdown" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Message From Chairman</a></li>
                                            <li><a class="dropdown-item" href="#">Curriculam Activities</a></li>


                                        </ul>
                                </li> --}}
                                @foreach ($menu->children as $child)
                                <li><a class="dropdown-item" @if($child->category_slug=='page') href="{{ $child->external_link ?? route('page', $child->title_slug) }}" @elseif($child->category_slug =="message" || $child->category_slug =="course") href="{{ $child->external_link??route('courseAndMessage', [$child->category_slug,$child->content_slug])}}"  @else href="{{ $child->external_link ?? route('category', $child->category_slug) }}" @endif>{{ $child->name }}</a></li>
                                @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
                <div class="sift_menu_bar">
                    <i class="las la-search"></i>
                </div>
                <div class="toggle-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </nav>
</div>
    </div>
</header>


<!-- Mobile Menu -->
<div id="mySidenav" class="sidenav">
<div class="mobile-logo">
<a href="{{ route('index') }}"><img src="{{ $setting->company_logo }}" alt="logo"></a>
<a href="javascript:void(0)" id="close-btn" class="closebtn">&times;</a>
</div>
<div class="no-bdr1">
<ul id="menu1">
    @foreach($headerMenu as $menu )
    <li>
        <a @if(count($menu->children)) class="has-arrow" @else  @if($menu->category_slug=='page') href="{{ $menu->external_link??route('page', $menu->title_slug)}}" @elseif($menu->category_slug =="message" || $menu->category_slug =="course") href="{{ $menu->external_link??route('courseAndMessage', [$menu->category_slug,$menu->content_slug])}}"  @else href="{{$menu->external_link??route('category',$menu->category_slug)}}" @endif @endif>{{ $menu->name }}</a>
        <ul>
            @foreach ($menu->children as $child)
            <li>
                <a @if($child->category_slug=='page') href="{{ $child->external_link??route('page', $child->title_slug)}}" @elseif($child->category_slug =="message" || $child->category_slug =="course") href="{{ $child->external_link??route('courseAndMessage', [$child->category_slug,$child->content_slug])}}"  @else href="{{$child->external_link??route('category',$child->category_slug)}}" @endif>{{ $child->name }}</a>
            </li>
            @endforeach

        </ul>
    </li>

    @endforeach
</ul>
</div>
</div>

@foreach ($popups as $pop)
@if($pop->show_on=='all-pages')
<div class="skip-ads">
    <div class="skip-ads-wrap">

        <div class="skip-ads-col only-desktop">
            <button type="" class="btn btn-primary"><i class="las la-times"></i></button>
            <a href="{{$pop->link}}" title=""><img src="{{$pop->image??asset('frontend/images/noimage.jpg')}}" alt="images"></a>
        </div>
        <div class="skip-ads-col only-mobile">
            <button type="" class="btn btn-primary"><i class="las la-times"></i></button>
            <a href="{{$pop->link}}" title=""><img src="{{$pop->image??asset('frontend/images/noimage.jpg')}}" alt="images"></a>
        </div>
    </div>
</div>
@elseif(request()->is('/') && $pop->show_on=='home-page-only')
<div class="skip-ads">
    <div class="skip-ads-wrap">
        {{-- <button type="" class="btn btn-primary"><i class="las la-times"></i></button> --}}
        <div class="skip-ads-col only-desktop">
            <button type="" class="btn btn-primary"><i class="las la-times"></i></button>
            <a href="{{$pop->link}}" title=""><img src="{{$pop->image??asset('frontend/images/noimage.jpg')}}" alt="images"></a>
        </div>
        <div class="skip-ads-col only-mobile">
            <button type="" class="btn btn-primary"><i class="las la-times"></i></button>
            <a href="{{$pop->link}}" title=""><img src="{{$pop->image??asset('frontend/images/noimage.jpg')}}" alt="images"></a>
        </div>
    </div>
</div>
@elseif(!request()->is('/') && $pop->show_on=='detail-page-only')
<div class="skip-ads">
    <div class="skip-ads-wrap">
        {{-- <button type="" class="btn btn-primary"><i class="las la-times"></i></button> --}}
        <div class="skip-ads-col only-desktop">
            <button type="" class="btn btn-primary"><i class="las la-times"></i></button>
            <a href="{{$pop->link}}" title=""><img src="{{$pop->image??asset('frontend/images/noimage.jpg')}}" alt="images"></a>
        </div>
        <div class="skip-ads-col only-mobile">
            <button type="" class="btn btn-primary"><i class="las la-times"></i></button>
            <a href="{{$pop->link}}" title=""><img src="{{$pop->image??asset('frontend/images/noimage.jpg')}}" alt="images"></a>
        </div>
    </div>
</div>
@endif
@endforeach






