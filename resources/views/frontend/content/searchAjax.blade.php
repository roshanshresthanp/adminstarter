
<div class="recent_news_" id="postReplace">
    <h4>Recent News</h4>
    @foreach ($recent as $value)
    <div class="in_flex_fx">
        <div class="images_img">
            <img src="{{ Storage::disk('uploads')->url($value->image) }}" alt="{{$value->content_title}}">
        </div>
        <div class="images_description">
          <a href="{{route('contentdetail', $value->content_url)}}">{{$value->content_title}}</a>
        </div>
    </div>
    @endforeach
</div>