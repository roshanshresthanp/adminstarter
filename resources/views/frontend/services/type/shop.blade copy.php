@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<section id="inner_page_header" style="background-image:url('{{ asset('frontend/images/terms-page.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul>
                    <li><a href="#">Home</a>/</li>
                    <li><a href="#">shop</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-end">
                <div class="header_flex">
                    <ul>
                        <li><a href="#">Offer</a>|</li>
                        <li><a href="#">Blog</a>|</li>
                        <li><a href="#">Events</a></li>
                    </ul>
                    <div class="hidden_side_menu">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="gallery_wrapper" class="o_padding">
    <div class="container">
        <div class="row">
            <!-- {{ dd($productCat) }} -->
            
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3 gallery_tab" id="pills-tab" role="tablist">
                    <!-- @foreach($productCat as $cat) -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-All-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-All" type="button" role="tab" aria-controls="pills-All"
                            aria-selected="true">All</button>
                    </li>

                    <!-- @endif -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Earth-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Earth" type="button" role="tab" aria-controls="pills-Earth"
                            aria-selected="true">Earth Rythm</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Chemistry-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Chemistry" type="button" role="tab" aria-controls="pills-Chemistry"
                            aria-selected="false">Juicy Chemistry</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Natures-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Natures" type="button" role="tab" aria-controls="pills-Natures"
                            aria-selected="false">Natures Tattva</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Kamaudi-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Kamaudi" type="button" role="tab" aria-controls="pills-Kamaudi"
                            aria-selected="false">Kamaudi</button>
                    </li>
                    
                </ul>
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-All" role="tabpanel"
                        aria-labelledby="pills-All-tab">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z1.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Silk Protein Shampoo Bar</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 950</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z2.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Cleansing balm match green tea</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 150</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z3.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Clear Skin Exfoliating Facial Cleanser with AHA & BHA</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1400</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z4.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Earth Rhythm Australian Pink Clay Mud Face Mask</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1400</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z5.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Earth Rhythm Lip Scrub Mint Julep - 10 gm</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1250</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z6.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Hair Serum</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1300</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z7.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Hydrating Scrub/Mask</h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1450</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z8.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Shampoo for Deep Conditioning</h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1600</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z9.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Cold Pressed Hemp Seed Oil</h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 900</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z10.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Toning Mist for Normal to Oily Skin with Bulgarian Rose Water</h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1200</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z11.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Eye Cream for Dark Circles and Fine Lines with Damask Rose and Coffee
                                            </h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 750</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z12.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Kasturi Manjal (Wild Turmeric)</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 650</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z13.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Pure Herbal Hibiscus Powder</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 700</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z14.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Pure & Natural Kaolin Clay</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 600</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z15.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Activated Bamboo Charcoal</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 750</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z16.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Neem Powder</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 650</span>
                                        </div>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-Earth" role="tabpanel" aria-labelledby="pills-Earth-tab">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z1.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Silk Protein Shampoo Bar</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 950</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z2.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Cleansing balm match green tea</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 150</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z3.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Clear Skin Exfoliating Facial Cleanser with AHA & BHA</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1400</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z4.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Earth Rhythm Australian Pink Clay Mud Face Mask</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1400</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z5.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Earth Rhythm Lip Scrub Mint Julep - 10 gm</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1250</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z6.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Hair Serum</h4>
                                            <span>Earth Rythm</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1300</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-Chemistry" role="tabpanel"
                        aria-labelledby="pills-Chemistry-tab">

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z7.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Hydrating Scrub/Mask</h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1450</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z8.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Shampoo for Deep Conditioning</h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1600</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z9.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Cold Pressed Hemp Seed Oil</h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 900</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z10.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Toning Mist for Normal to Oily Skin with Bulgarian Rose Water</h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 1200</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z11.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Eye Cream for Dark Circles and Fine Lines with Damask Rose and Coffee
                                            </h4>
                                            <span>Juicy Chemistry</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 750</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-Natures" role="tabpanel" aria-labelledby="pills-Natures-tab">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z12.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Kasturi Manjal (Wild Turmeric)</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 650</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z13.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Pure Herbal Hibiscus Powder</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 700</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z14.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Pure & Natural Kaolin Clay</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 600</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z15.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Activated Bamboo Charcoal</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 750</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery_gp_card wow bounceInUp">
                                    <a href="">
                                        <div class="gallery_thumbnail_gt">
                                            <img src="{{ asset('frontend/images/z16.png') }}" alt="">
                                        </div>
                                        <div class="gallery_caption_gc">
                                            <h4>Neem Powder</h4>
                                            <span>Natures Tattva</span>
                                        </div>
                                        <div class="gallery_absolute_wrap">
                                            <span>Rs: 650</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="pills-Community" role="tabpanel"
                        aria-labelledby="pills-Community-tab">
                        ..6.</div>

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
