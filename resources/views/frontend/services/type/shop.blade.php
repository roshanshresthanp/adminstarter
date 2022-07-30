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
                        <li><a href="#">Products</a>|</li>
                        <li><a href="#">Shop</a>|</li>
                        {{-- <li><a href="#">Events</a></li> --}}
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
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3 gallery_tab" id="pills-tab" role="tablist">
                    @foreach($productCat as $cat)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active  @endif" id="pills-{{ $cat->id }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $cat->id }}" type="button" role="tab" aria-controls="{{ $cat->id }}"
                            aria-selected="false">{{ $cat->title }}</button>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach ($productCat as $cat)
                    <div class="tab-pane fade @if($loop->first) show active @endif" id="pills-{{$cat->id }}" role="tabpanel"
                    aria-labelledby="pills-{{ $cat->id }}-tab">
                    <div class="row">
                        @forelse($cat->products as $product)

                        <div class="col-lg-3">
                            <div class="gallery_gp_card wow bounceInUp">
                                <a href="{{ route('product.detail',$product->slug)}}">
                                    <div class="gallery_thumbnail_gt">
                                        <img src="{{Storage::disk('uploads')->url($product->image)}}" alt="">
                                    </div>
                                    <div class="gallery_caption_gc">
                                        <h4>{{ $product->brief_description }}</h4>
                                        <span>{{ $product->title }}</span>
                                    </div>
                                    <div class="gallery_absolute_wrap">
                                        <span>Rs {{ $product->price }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @empty
                        <p>No product found</p>
                        @endforelse
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
{{-- <div class="fixed_side_scroll_menu">
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
</div> --}}
@endsection
