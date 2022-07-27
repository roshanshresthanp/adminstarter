<form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="row">
        <div class="col-md-6">
            <label for="company_favicon">Index Background image:</label>
            <div class="input-group">
                <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail112" data-preview="holder112" class="btn btn-primary lfm" >
                    <i class="fa fa-picture-o"></i> Choose
                  </a>
                </span>
                <input id="thumbnail112" class="form-control" value="{{$setting->home_bg_img}}" type="text" name="home_bg_img" onchange="loadHomeBg()" readonly>
              </div>
              <img id="holder112" style="margin-top:15px;max-height:100px;">
              <p class="text-danger">
                {{ $errors->first('home_bg_img') }}
            </p>
        </div>

        <div class="col-md-3 mt-2">
            <label for="">Recent home bg:</label> <br>
            <img id="home_bg_output" style="height: 100px;" src="{{$setting->home_bg_img??Storage::disk('uploads')->url('noimage.jpg')}}">
        </div>


        <div class="col-md-12">
            <h3>Below slider</h3>
        </div>
        <div class="col-md-6">
            <label for="">First</label>
            <div class="form-group">
                <input type="text" class="form-control" name="first_main_title" value="{{ $setting->first_main_title }}" placeholder="main title">
                <p class="text-danger">
                    {{ $errors->first('first_main_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="first_sub_title" value="{{ $setting->first_sub_title }}" placeholder="sub title">
                <p class="text-danger">
                    {{ $errors->first('first_sub_title') }}
                </p>
            </div>
        </div>


        <div class="col-md-6">
            <label for="">Second</label>
            <div class="form-group">
                <input type="text" class="form-control" name="second_main_title" value="{{ $setting->second_main_title }}" placeholder="main title">
                <p class="text-danger">
                    {{ $errors->first('second_main_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="second_sub_title" value="{{ $setting->second_sub_title }}" placeholder="sub title">
                <p class="text-danger">
                    {{ $errors->first('second_sub_title') }}
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <label for="">Third</label>
            <div class="form-group">
                <input type="text" class="form-control" name="third_main_title" value="{{ $setting->third_main_title }}" placeholder="main title">
                <p class="text-danger">
                    {{ $errors->first('third_main_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="third_sub_title" value="{{ $setting->third_sub_title }}" placeholder="sub title">
                <p class="text-danger">
                    {{ $errors->first('third_sub_title') }}
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <label for="">Fourth</label>
            <div class="form-group">
                <input type="text" class="form-control" name="fourth_main_title" value="{{ $setting->fourth_main_title }}" placeholder="main title">
                <p class="text-danger">
                    {{ $errors->first('fourth_main_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="fourth_sub_title" value="{{ $setting->fourth_sub_title }}" placeholder="sub title">
                <p class="text-danger">
                    {{ $errors->first('fourth_sub_title') }}
                </p>
            </div>
        </div>

        <div class="col-md-12">
            <h3>Course section</h3>
        </div>

        <div class="col-md-6">
            <label for="">Main Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="course_main_title" value="{{ $setting->course_main_title }}" placeholder="Course main title">
                <p class="text-danger">
                    {{ $errors->first('course_main_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Sub Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="course_sub_title" value="{{ $setting->course_sub_title }}" placeholder="Course sub title">
                <p class="text-danger">
                    {{ $errors->first('course_sub_title') }}
                </p>
            </div>
        </div>

        <div class="col-md-12">
            <h3>Why NIT Number Roll</h3>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="total_employees">Total Learner (in number) : </label>
                <input type="number" class="form-control" name="total_learner" placeholder="Total Learner." value="{{ $setting->total_learner }}">
                <p class="text-danger">
                    {{ $errors->first('total_learner') }}
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="total_employees">Total Nationality (in number) : </label>
                <input type="number" class="form-control" name="total_nationality" placeholder="Total Followers." value="{{ $setting->total_nationality}}">
                <p class="text-danger">
                    {{ $errors->first('total_nationality') }}
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="happy_clients">Total Co-curricular activity : </label>
                <input type="number" class="form-control" name="total_activity" placeholder="Total co-curricular activity" value="{{ $setting->total_activity}}">
                <p class="text-danger">
                    {{ $errors->first('total_activity') }}
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <label for="">Learner</label>
            <div class="form-group">
                <input type="text" class="form-control" name="learner_main_title" value="{{ $setting->learner_main_title }}" placeholder="main title">
                <p class="text-danger">
                    {{ $errors->first('learner_main_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="learner_sub_title" value="{{ $setting->learner_sub_title }}" placeholder="side title">
                <p class="text-danger">
                    {{ $errors->first('learner_sub_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Nationality</label>
            <div class="form-group">
                <input type="text" class="form-control" name="nationality_main_title" value="{{ $setting->nationality_main_title }}" placeholder="main title">
                <p class="text-danger">
                    {{ $errors->first('nationality_main_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nationality_sub_title" value="{{ $setting->nationality_sub_title }}" placeholder="side title">
                <p class="text-danger">
                    {{ $errors->first('nationality_sub_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Activity</label>
            <div class="form-group">
                <input type="text" class="form-control" name="activity_main_title" value="{{ $setting->activity_main_title }}" placeholder="main title">
                <p class="text-danger">
                    {{ $errors->first('activity_main_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="activity_submain_title" value="{{ $setting->activity_submain_title }}" placeholder="sub main title">
                <p class="text-danger">
                    {{ $errors->first('activity_submain_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="activity_sub_title" value="{{ $setting->activity_sub_title }}" placeholder="side title">
                <p class="text-danger">
                    {{ $errors->first('activity_sub_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Distance Learning</label>
            <div class="form-group">
                <input type="text" class="form-control" name="from_title" value="{{ $setting->from_title }}" placeholder="from title">
                <p class="text-danger">
                    {{ $errors->first('from_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="anywhere_title" value="{{ $setting->anywhere_title }}" placeholder="sub main title">
                <p class="text-danger">
                    {{ $errors->first('anywhere_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="to_title" value="{{ $setting->to_title }}" placeholder="to title">
                <p class="text-danger">
                    {{ $errors->first('to_title') }}
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="distance_learning_title" value="{{ $setting->distance_learning_title }}" placeholder="Distance learning title">
                <p class="text-danger">
                    {{ $errors->first('distance_learning_title') }}
                </p>
            </div>

        </div>

        <div class="col-md-12">
            <h3>News and Notice</h3>
        </div>
        <div class="col-md-6">
            <label for="">News Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="news_main_title" value="{{ $setting->news_main_title }}" placeholder="News main title">
                <p class="text-danger">
                    {{ $errors->first('news_main_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Notice Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="news_sub_title" value="{{ $setting->news_sub_title }}" placeholder="Notice main title">
                <p class="text-danger">
                    {{ $errors->first('news_sub_title') }}
                </p>
            </div>
        </div>

        <div class="col-md-12">
            <h3>Blog section</h3>
        </div>
        <div class="col-md-6">
            <label for="">Main Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="blog_main_title" value="{{ $setting->blog_main_title }}" placeholder="Blog main title">
                <p class="text-danger">
                    {{ $errors->first('blog_main_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Sub Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="blog_sub_title" value="{{ $setting->blog_sub_title }}" placeholder="Blog sub title">
                <p class="text-danger">
                    {{ $errors->first('blog_sub_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <h3>Partner section</h3>
        </div>
        <div class="col-md-6">
            <label for="">Main Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="partner_main_title" value="{{ $setting->partner_main_title }}" placeholder="Partner main title">
                <p class="text-danger">
                    {{ $errors->first('partner_main_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">Sub Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="partner_sub_title" value="{{ $setting->partner_sub_title }}" placeholder="Partner sub title">
                <p class="text-danger">
                    {{ $errors->first('partner_sub_title') }}
                </p>
            </div>
        </div>
        {{-- <div class="row"> --}}
            <div class="col-md-12">
                <h3>Subscribe section</h3>
            </div>
            <div class="col-md-6">
            <label for="">Main Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="subscribe_main_title" value="{{ $setting->subscribe_main_title }}" placeholder="Subscribe main title">
                <p class="text-danger">
                    {{ $errors->first('subscribe_main_title') }}
                </p>
            </div>
            </div>
        <div class="col-md-6">
            <label for="">Sub Title</label>
            <div class="form-group">
                <input type="text" class="form-control" name="subscribe_sub_title" value="{{ $setting->subscribe_sub_title }}" placeholder="Subscribe sub title">
                <p class="text-danger">
                    {{ $errors->first('subscribe_sub_title') }}
                </p>
            </div>
        </div>
        <div class="col-md-12 text-center mt-4">
            <button type="submit" class="btn btn-success" name="home">Submit</button>
        </div>
    </div>
    </div>
</form>
