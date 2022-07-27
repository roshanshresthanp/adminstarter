@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@push('styles')
    <style>
        .success-message {
            position: absolute !important;
            right: 0;
            z-index: 1;
        }

    </style>
@endpush
@section('content')
<div class="container">
    @if (session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
</div>

{{-- <section id="inner_page_header" style="background-image:url('{{ $category->banner_image == null ? asset('frontend/img/banner.jpg') : Storage::disk('uploads')->url($category->banner_image) }}')" class="text_place">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    <li><a href="@php echo url('/'); @endphp">Home</a>/</li>
                    <li><a href="#">Book Now</a></li>
                </ul>
            </div>
        </div>
    </div>
</section> --}}
<section id="bookNow_wrapper" class="o_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{ route('bookingproduct.store') }}">
                    @csrf
                    <div class="booking_form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="margin_down">
                                    <label>Product Category </label>
                                <input type="text" value="{{ $product->category->title }}" name="product_type" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="margin_down">
                                    <label>Price</label>
                                    <input type="text" name="product_price" value="{{ $product->price }}" class="form-control" readonly>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="margin_down">
                                    <label>Product title</label>
                                    <input type="text" value="{{ $product->title }}" name="product_title" class="form-control" readonly>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="margin_down">
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Your Name">
                                </div>
                                <p style="color: red">{{ $errors->first('name')}}</p>

                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-lg-6">
                                <div class="margin_down">
                                    <input type="date" name="appointment_date" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Appoinment Date">
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="margin_down">
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Email Address" required>
                                </div>
                                <p style="color: red">{{ $errors->first('email')}}</p>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="margin_down">
                                    <input type="text" name="subject" class="form-control" id="subject"
                                        placeholder="Enter subject">
                                </div>
                                <p style="color: red">{{ $errors->first('subject')}}</p>

                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="margin_down">
                                    <input type="text" name="contact_no" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Phone number" required>
                                </div>
                                <p style="color: red">{{ $errors->first('contact_no')}}</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="margin_down">

                                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Address">
                                </div>
                                <p style="color: red">{{ $errors->first('address')}}</p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="margin_down">
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Your Message" required></textarea>
                                </div>
                                <p style="color: red">{{ $errors->first('message')}}</p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-secondary">Book Now<i class="las la-angle-right"></i></button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="booknow_rightside">
                    <div class="contact-wrapper pl-75 mb-30">
                        <div class="section-title mb-30">
                            <h2>Get In Touch With Us</h2>
                            <p>Contact Us for More inquery. We are always here to help you.</p>
                        </div>
                        <div class="single-contact-box mb-30">
                            <div class="contact__iocn">
                                <img src="{{asset('frontend/assets/img/icon/material-location-on.svg')}}" alt="">
                            </div>
                            <div class="contact__text">
                                <h5>{{ companydata('local_address') }}, {{ companydata('district->dist_name') }},
                                    {{ companydata('province->eng_name') }} </h5>
                            </div>
                        </div>
                        <div class="single-contact-box cb-2 mb-30">
                            <div class="contact__iocn">
                                <img src="{{asset('frontend/assets/img/icon/phone-alt.svg')}}" alt="">
                            </div>
                            <div class="contact__text">
                                <h5>{{ companydata('contact_no') }}</h5>
                                <h5>{{ companydata('contact_no') }}</h5>
                            </div>
                        </div>
                        <div class="single-contact-box cb-3 mb-30">
                            <div class="contact__iocn">
                                <img src="{{asset('frontend/assets/img/icon/feather-mail.svg')}}" alt="">
                            </div>
                            <div class="contact__text">
                                <h5>{{ companydata('email') }}</h5>
                                <h5>{{ companydata('email') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--contact-map-area start-->
<section class="contact-map-area">
    <div class="container-fluid px-0">
        <div class="row gx-0">
            <div class="col-lg-12">
                <div class="conatct-map">
                    <iframe src="{{ companydata('map_url') }}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: route('reloadCaptcha'),
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endpush
