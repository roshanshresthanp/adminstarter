<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
    @yield('meta')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$setting->company_name}} @isset($meta) | {{ $meta['meta_description']}} @endisset</title>
    <link rel="icon" href="{{$setting->company_favicon}}" />
    <link href="{{ asset('frontend/plugins/lineawesome/css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/metisMenu.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/lightgallery.min.css')}}" />
    <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet">



        <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.min.css')}}">
    @stack('styles')
    </head>
    <body>
        @if(!request()->is(['*inquiry-form','*admission-form','*registration-form']))
        <x-header-component />
        @endif

        @yield('content')

        @if(!request()->is(['*inquiry-form','*admission-form','*registration-form']))
        @include('frontend.includes.footer')
        @endif

        <!-- JS here -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="{{ asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery-migrate-3.0.0.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('frontend/js/tilt.jquery.min.js')}}"></script>
        <script src="{{ asset('frontend/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('frontend/js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('frontend/js/wow.min.js')}}"></script>
        <script src="{{ asset('frontend/js/script.js')}}"></script>
        <script src="{{ asset('frontend/js/lightgallery-all.min.js')}}"></script>

        <!--Toastr -->
        <script src="{{asset('backend/plugins/toastr/toastr.min.js')}}"></script>
        @stack('scripts')
        @include('frontend.layouts.message')

    </body>

</html>
