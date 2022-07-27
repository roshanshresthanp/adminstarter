<div class="postReplace">
    @foreach ($recent as $value)
    <div class="rp_flex">
        <div class="rp_images">
            <a href="{{route('servicedetail', $value->slug)}}"><img src="{{Storage::disk('uploads')->url($value->icon)}}" alt="{{$value->title}}"></a>
        </div>
        <div class="rp_content">
            <a href="{{route('servicedetail', $value->slug)}}">{{$value->title}}</a>
        </div>
    </div>
    @endforeach
    </div>