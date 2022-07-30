@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')


<section id="inner_page_header" style="background-image:url('images/1619954356.jpg')" class="text_place">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    <li><a href="#">Home</a>/</li>
                    <li><a href="#">Details</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="detail_wrapper" class="o_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="container_maker">
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach($product->images as $img)
                                        <li><img src="{{Storage::disk('uploads')->url($img->image)}}" /></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="las la-angle-left"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="las la-angle-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- {{ $product }} --}}
                    <div class="col-lg-6">
                        <div class="detail_of_items">
                            <h3>{{ $product->title }}</h3>
                            {{-- <p class="rating_value">
                                <span>
                                    <i class="lar la-star"></i>
                                    <i class="lar la-star"></i>
                                    <i class="lar la-star"></i>
                                    <i class="lar la-star"></i>
                                    <i class="lar la-star"></i>
                                </span>
                                <span>91 Ratings</span>
                            </p> --}}
                            <p>{!! $product->main_description !!}</p>
                            <ul>
                                <li> Price : Rs {{ $product->price }}</li>
                                {{-- <li> 90 Min: 4000</li>
                                <li>120 Min: 5000</li> --}}
                            </ul>
                            <a href="{{ route('bookingproduct.form',$product->slug) }}" class="btn btn-secondary">Book Now<i class="las la-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <div class="event_thumbnail wow bounceInUp">
                    <div class="event_thumbnail_images">
                        <img src="images/c1.jpg" alt="">
                    </div>
                    <div class="event_caption">
                        <h4>SOUND BATH - FEBRUARY, 2022</h4>
                        <p>Come lay your mind to rest and find your center again with Ramesh.</p>
                        <a href="#" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<section id="balance_diet_wrapper" class="o_buttom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="site_title wow bounceInDown">
                    <h3><span>Recent Product</span></h3>
                    <p><i>Take a deep breath, relax and let us take care of you. Join us for a complete mindful
                            experience.</i></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="id_cafe_slider" class="owl-carousel">
                    @foreach ($recentProducts as $pro)
                    <div>
                        <div class="delicacy_card wow bounceInDown" data-wow-delay="0.5s">
                            <div class="delicacy_thumbnail">
                                <img src="{{ Storage::disk('uploads')->url($pro->image) }}" alt="">

                            </div>
                            <div class="delicacy_caption">
                                <h3>{{ $pro->title }}</h3>
                                <span></i>Rs {{ $pro->price }}</span>
                                <a href="{{ route('product.detail',$pro->slug) }}" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div>
                        <div class="delicacy_card wow bounceInDown">
                            <div class="delicacy_thumbnail">
                                <img src="images/Egg_Sandwich.jpg" alt="">

                            </div>
                            <div class="delicacy_caption">
                                <h3>Sandwich</h3>
                                <span><i class="las la-dollar-sign"></i>25</span>
                                <a href="#" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="delicacy_card wow bounceInDown" data-wow-delay="0.5s">
                            <div class="delicacy_thumbnail">
                                <img src="images/Egg_Sandwich.jpg" alt="">

                            </div>
                            <div class="delicacy_caption">
                                <h3>Sandwich</h3>
                                <span><i class="las la-dollar-sign"></i>25</span>
                                <a href="#" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="delicacy_card wow bounceInDown">
                            <div class="delicacy_thumbnail">
                                <img src="images/Egg_Sandwich.jpg" alt="">

                            </div>
                            <div class="delicacy_caption">
                                <h3>Sandwich</h3>
                                <span><i class="las la-dollar-sign"></i>25</span>
                                <a href="#" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="delicacy_card wow bounceInDown" data-wow-delay="0.5s">
                            <div class="delicacy_thumbnail">
                                <img src="images/Egg_Sandwich.jpg" alt="">

                            </div>
                            <div class="delicacy_caption">
                                <h3>Sandwich</h3>
                                <span><i class="las la-dollar-sign"></i>25</span>
                                <a href="#" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
