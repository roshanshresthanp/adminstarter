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