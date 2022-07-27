<!-- NewsLetter -->
<section class="newsletter mt">
    <div class="container">
        <div class="newsletter-wrap wow bounceInDown center" data-wow-duration="2s">
            <div class="newsletter-info">
                <h3>{!! $setting->subscribe_main_title !!}</h3>
                <p>{!! $setting->subscribe_sub_title !!}</p>
            </div>
            <div class="newsletter-form">
            <form action="{{ route('subscribe')}}" method="post">
                @csrf
                @method('POST')
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    <button type="submit">Subscribe <i class="lab la-telegram-plane"></i></button>
            </form>

            </div>
                        {{-- <p class="text-danger">{{ $errors->first('email') }}</p> --}}

        </div>
    </div>
</section>
<!-- Newsletter End -->

<footer class="bg-color">
    <div class="container pt-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-contact wow bounceInLeft" data-wow-duration="1s">
                    <img src="{{$setting->footer_logo??$setting->company_logo}}" alt="{{$setting->company_name}}">
                    <p>
                        {!! $setting->brief_description !!}
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-menu wow bounceInDown center" data-wow-duration="1s">
                    <h6 class="text-uppercase font-weight-bold mb-4"><span>Quick</span> Link</h6>
                    <ul class="list-unstyled mb-0">
                        @foreach ($footerMenu as $menu)
                        <li class="mb-2"><a @if($menu->category_slug=='page') href="{{ $menu->external_link??route('page', $menu->title_slug)}}" @elseif($menu->category_slug =="message" || $menu->category_slug =="course") href="{{ $menu->external_link??route('courseAndMessage', [$menu->category_slug,$menu->content_slug])}}"  @else href="{{$menu->external_link??route('category',$menu->category_slug)}}" @endif><i class="las la-angle-right"></i>{{ $menu->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-information wow bounceInRight" data-wow-duration="1s">
                    <h6 class="text-uppercase font-weight-bold mb-4"><span>Quick</span> Contact</h6>
                    <ul class="contact_detail_footer">
                        <li><i class="las la-map-marker-alt"></i>{{ $setting->local_address.' , '.$setting->district->dist_name }} , Nepal</li>
                        <li><i class="las la-map-pin"></i>PIN : {{ $setting->post_no }}, {{ $setting->district->dist_name }}, Nepal</li>
                        <li><i class="las la-phone"></i>{{ $setting->contact_no }} / {{ $setting->phone}} </li>
                        <li><i class="las la-envelope"></i>{{ $setting->email }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyrights -->
</footer>


<div class="footer-bottom">
    <div class="container">
        <ul>
            <li class="wow bounceInLeft" data-wow-duration="2s">&copy; Copyright {{ now()->year }} Schools. All rights reserved.</li>
            <li class="wow bounceInRight" data-wow-duration="3s">Design & Developed By: <a target="blank" href="https://www.nectardigit.com">Nectar Digit</a></li>
        </ul>
    </div>
</div>

<!-- Search -->
<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>
            <div class="search-overlay-form">
                <form action="{{route('home.search')}}" method="POST">
                    @csrf
                    <input type="text" name="search" class="input-search" placeholder="Search here..." required>
                    <button type="submit"><i class="las la-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->

<!-- Scroll Top -->
<div class="go-top">
    <div class="pulse">
        <i class="las la-angle-up"></i>
    </div>
</div>
<!-- Scroll Top End -->
