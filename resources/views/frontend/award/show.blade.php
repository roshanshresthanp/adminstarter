@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
<section id="banner_header_wrapper" style="background-image:url('{{ Storage::disk('uploads')->url($award->banner_image??'banner.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="bread_crumb_link">
                    <li><a href="{{route('index')}}">Home</a> /</li>
                    <li><a href="#">{{$award->title}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="newsDetail_wrapper" class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="nex_news_detail_content mt-2">
                    <img src="{{ Storage::disk('uploads')->url($award->cover_image??'noimage.jpg') }}" alt="{{$award->title}}">
                    <h1>{{$award->title}}</h1>
                    <p>{!!$award->description!!}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="news_detail_js">
                    <div class="search_box_fx">
                        <input type="text" id="search" placeholder="Search">
                    </div>
                    <div class="recent_news_" id="postReplace">
                        <h4>Recent Awards</h4>
                        @foreach ($recent as $value)
                        <div class="in_flex_fx">
                            <div class="images_img">
                                <img src="{{ Storage::disk('uploads')->url($value->cover_image??$value->banner_image??'noimage.jpg') }}" alt="{{$value->title}}">
                            </div>
                            <div class="images_description">
                              <a href="{{route('award-detail', $value->slug)}}">{{$value->title}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){

        $("#search").on("keyup",function(){
        var value = $(this).val();
        // console.log(value);
        $.ajax({
            'url':"{{ route('award.search') }}",
            'method': "get",
            'data': {search:value},

            success:function(response){

                // console.log(response);
                $('#postReplace').replaceWith(response);

            }

        });

      });
    });
    </script>

@endpush
