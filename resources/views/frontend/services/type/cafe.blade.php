@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<section id="inner_page_header" style="background-image:url({{ Storage::disk('uploads')->url($details->image) }})">
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
                        <li><a href="#">Service</a>|</li>
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
<section id="cafe_about_cover" class="o_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cafe_thumbnail feel_animation wow bounceInLeft">
                    <img src="{{ Storage::disk('uploads')->url($details->image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="cafe_content_wrapper wow bounceInRight">
                    <h4>{{$details->title}}</h4>
                    <p>{!! $details['description'] !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="nutrition_group_cover" class="o_buttom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="site_title wow bounceInDown" style="visibility: visible; animation-name: bounceInDown;">
                    <h3><span>Suggestions</span></h3>
                    <p><i>Take a deep breath, relax and let us take care of you. Join us for a complete mindful
                            experience.</i></p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($suggestions as $suggest)
            <div class="col-lg-3">
                <div class="nutrition_card wow bounceInDown" data-wow-delay="0.5s">
                    <div class="nutrition_card_images">
                        <img src="{{Storage::disk('uploads')->url($suggest->image)}}" alt="{{ $suggest->name }}" height="200px">
                    </div>
                    <div class="nutrition_caption">
                        <h3>{{ $suggest->name }}</h3>
                        <a href="{{route('foodmenudetail', $suggest->slug)}}" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<section id="balance_diet_wrapper" class="o_buttom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="site_title wow bounceInDown">
                    <h3><span>Nourish's Delicacy</span></h3>
                    <p><i>Take a deep breath, relax and let us take care of you. Join us for a complete mindful
                            experience.</i></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="id_cafe_slider" class="owl-carousel">
                    @foreach ($allmenu as $value)
                    <div>
                        <div class="delicacy_card wow bounceInDown" data-wow-delay="0.5s">
                            <div class="delicacy_thumbnail">
                                <img src="{{ Storage::disk('uploads')->url($value->image) }}" alt="{{$value->name}}">

                            </div>
                            <div class="delicacy_caption">
                                <h3>{{$value->name}}</h3>
                                <span>Rs. {{$value->price}}</span>
                                <a href="{{route('foodmenudetail', $value->slug)}}" class="btn btn-secondary">Read More<i class="las la-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<section id="cafe_gallery_cover" class="o_buttom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="site_title wow bounceInDown" style="visibility: visible; animation-name: bounceInDown;">
                    <h3><span>Our Gallery</span></h3>
                    <p><i>Explore the things within us.</i></p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($gallery as $imp)
            <div class="col-lg-4">
                <div class="cg_gallery_thumbnail wow bounceInDown">

                        <img src="{{ Storage::disk('uploads')->url($imp->album_cover) }}" alt="">
                        <a class="link_token" href="{{ route('image',$imp->title_slug) }}"><i class="las la-link"></i></a>
                </div>
                {{-- <div class="cg_gallery_thumbnail feel_animation wow bounceInDown">
                    <img src="{{ asset('frontend/images/1629877868.jpg') }}" alt="">
                </div> --}}
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="cafe_menu_wrapper" Class="o_buttom_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills cafe_menu_tab" id="myTab" role="tablist">
                    @foreach($menuTypes as $menuType)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  @if($loop->first) active @endif" id="pills-{{ $menuType->slug }}-tab" data-bs-toggle="tab" data-bs-target="#pills-{{ $menuType->slug }}"
                            type="button" role="tab" aria-controls="pills-{{ $menuType->slug }}" aria-selected="true">{{ $menuType->name }}</button>
                    </li>

                    @endforeach

                </ul>

                <div class="tab-content" id="myTabContent">
                    @foreach ($menuTypes as $menuType)
                    <div class="tab-pane fade @if($loop->first) show active @endif" id="pills-{{ $menuType->slug }}" role="tabpanel" aria-labelledby="pills-{{ $menuType->slug }}-tab">
                        <!-- Start sub tab -->
                        <ul class="nav nav-pills mb-3 all_day_menu_tab" id="pills-tab" role="tablist">
                            @foreach ($menuType->foodType as $fType)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link @if($loop->first) active @endif" id="pills-{{ $fType->slug }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $fType->slug }}" type="button" role="tab"
                                    aria-controls="pills-{{ $fType->slug }}" aria-selected="true">{{ $fType->name }}</button>
                            </li>
                            @endforeach

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach ($menuType->foodType as $item)
                            <div class="tab-pane fade @if($loop->first) active show @endif " id="pills-{{ $item->slug }}" role="tabpanel"
                                aria-labelledby="pills-{{ $item->slug }}-tab">

                                <div id="slider_two" class="owl-carousel common_slider_option">
                                    {{-- {{  dd($food);}} --}}

                                    @forelse($item->foods as $food)
                                    <div>
                                        <div class="item_thumbnails">


                                            <div class="items_images">
                                                <img src="{{Storage::disk('uploads')->url($food->image) }}" alt="{{ $food->name }}">
                                            </div>
                                            <div class="item_caption">
                                                <P>{{ $food->name }}</P>
                                                <p>{{ str_limit($food->description,100) }}</p>
                                                <p class="item_price"><span>Rs.</span> {{ $food->price }}</p>
                                            </div>


                                        </div>
                                    </div>
                                    @empty
                                    <p>No food found</p>
                                    @endforelse
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <!-- End sub tab -->
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
