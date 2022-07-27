@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
{{-- @push('styles')
    <style>
        .success-message {
            position: absolute !important;
            right: 0;
            z-index: 1;
        }

    </style>
@endpush --}}
@section('content')
<!-- Banner -->
<section class="banner" style="background-image: url({{ $category->banner_image??asset('frontend/images/banner.jpg')}});">
	<div class="container">
		<div class="banner-wrap">
			<h1>{{ $category->page_title }}</h1>
		</div>
	</div>
</section>
<!-- Banner End -->

<section class="general-page">
	<div class="container">
		<div class="general-content wow bounceInLeft" data-wow-duration="1s">
			{{-- <h3>{{$data->page_title }}</h3> --}}
			<p>
                {!! $category->content !!}
			</p>

		</div>
	</div>
</section>

<!-- Contact Us -->
<section class="contact-us pt pb">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="contact-box wow bounceInLeft" data-wow-duration="1s">
					<i class="las la-envelope-open-text"></i>
					<span>Email Us</span>
					<p>{{ $setting->email }}</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="contact-box wow bounceInDown center" data-wow-duration="1s">
					<i class="las la-phone-volume"></i>
					<span>Call Us</span>
					<p>{{ $setting->contact_no }}</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="contact-box wow bounceInDown center" data-wow-duration="1.5s">
					<i class="las la-map-signs"></i>
					<span>Address</span>
					<p>{{ $setting->local_address }}, Nepal</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="contact-box wow bounceInRight" data-wow-duration="1s">
					<i class="las la-clock"></i>
					<span>Opening Time</span>
					<p>{{ $setting->opening_time }}</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="contact-form mt wow bounceInLeft center" data-wow-duration="1s">
					<h3>Drop us a message for any query</h3>
					<form action="{{ route('message.store') }}" method="POST">
                        @csrf
                        @method('POST')
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Your Name" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Your Email" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="contact_no" class="form-control" placeholder="Your Phone">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="subject" class="form-control" placeholder="Your Subject">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="message" class="form-control" placeholder="Your Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="contact-btn">
									<button type="submit" class="btn btn-danger">Send Message</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="map mt wow bounceInRight center" data-wow-duration="1s">
					<iframe src="{{ $setting->map_url }}" width="100%" height="484" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact Us End -->

@endsection
@push('scripts')
    {{-- <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: route('reloadCaptcha'),
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script> --}}
@endpush
