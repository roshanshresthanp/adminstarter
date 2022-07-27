@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/plugins/nepali-date-selection/dist/nepaliDatePicker.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush
<form action="{{route('apply.submit')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
<div class="dv_inquiry_form_wrapper">
    {{-- <div class="download_button">
        <a href="#" class="btn btn-dark">Download Form</a>
    </div> --}}

    <div class="dv_inquiry_header">
        <div class="logo_area">
            <img src="{{ $setting->company_logo }}" alt="">
        </div>
        <div class="header_detail_area">
            <h3>{{ $setting->company_name }}</h3>
            <p>{{ $setting->local_address }} | Phone: {{ $setting->contact_no }}</p>
            <p>Email: {{ $setting->email }}</p>
            <span>{{$category->page_title??$data->content_page_title??'Inquiry Form' }}</span>
        </div>
        <div class="photo_area">
            <div class="student_images gallery">
                <input type="file" name="image" id="gallery-photo-add"> PP size recent color photo
                <br>(Click here to add)

            </div>
            <p class="text-danger">{{ $errors->first('image') }}</p>

        </div>
    </div>

    <div class="dv_inquiry_body">
        <div class="mark_text">
            <p>Fields with (*) are compulsory.</p>
        </div>
        <div class="dv_form_title">
            <h2>STUDENT'S INFORMATION</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="">Name of the Applicant (Full Name)*:</label>
            </div>
            <div class="col-lg-12">
                <input id="student-name" name="student_name" value="{{ old('student_name') }}" type="text" class="col" required>
                <p class="text-danger">{{ $errors->first('student_name') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label class="req-label">Applied For Stream :</label>
                    <select name="applied_stream" id="" class="flex-grow-1">
                            <option value="">Select Course</option>
                            {{-- <option value="XI-Science">XI-Science</option>
                            <option value="XI-Humanities">XI-Humanities</option>
                            <option value="XI-Management">XI-Management</option>
                            <option value="XII-Science">XII-Science</option>
                            <option value="XII-Humanities">XII-Humanities</option>
                            <option value="XII-Management">XII-Management</option> --}}
                        @foreach ($courseCats as $item)
                            <option class="select-title" disabled="" value="">
                                {{ $item->title }}
                            </option>
                            @foreach ($item->course as $course)
                                <option value="{{ $course->title }}">{{ $course->title }}
                                </option>
                            @endforeach
                        @endforeach

                    </select>

                </div>
                <p class="text-danger">{{ $errors->first('applied_stream') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="current_grade">Current Grade :</label>
                    <input type="text" id="current_grade" value="{{ old('current_grade') }}" class="flex-grow-1" name="current_grade" >
                </div>
                <p class="text-danger">{{ $errors->first('current_grade') }}</p>

            </div>
            <div class="col-lg-6" style="display: none">
                <div class="flex_1">
                    <input type="hidden" id="" value="inquiry" class="flex-grow-1" name="type" >
                </div>
                <p class="text-danger">{{ $errors->first('type') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="flex_1">
                    <label class="req-label">Gender :</label>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="Male"  class="gender_radio">
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="Female">
                </div>
                <p class="text-danger">{{ $errors->first('gender') }}</p>


            </div>
            <div class="col-lg-4">
                <div class="flex_1">
                    <label for="nationality">Nationality :</label>
                    <select name="nationality" id="nationality" class="flex-grow-1" >
                        <option value="Nepali" selected="selected">Nepali</option>
                        <option value="Indian">Indian</option>
                        {{-- <option value="Afghan/Afghani">Afghan/Afghani</option> --}}
                        <option value="Bangladeshi">Bangladeshi</option>
                        <option value="Chinese">Chinese</option>
                        {{-- <option value="Kazakh/Kazakhstani ">Kazakh/Kazakhstani </option> --}}
                        <option value="Pakistani">Pakistani</option>
                        <option value="Sri Lankan">Sri Lankan</option>
                    </select>
                </div>
                <p class="text-danger">{{ $errors->first('nationality') }}</p>

            </div>
            <div class="col-lg-4">
                <div class="flex_1">
                    <label for="">Email :</label>
                    <input type="text" id="" name="email" placeholder="" value="{{ old('email') }}" class="flex-grow-1" >
                </div>
                <p class="text-danger">{{ $errors->first('email') }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="flex_1">
                    <label for="ad">Date of Birth </label>
                    <input type="text" id="datepicker-english" name="dob_ad" placeholder="YYYY-MM-DD" value="{{ old('dob_ad') }}" class="flex-grow-1"  autocomplete="off">AD
                </div>
                <p class="text-danger">{{ $errors->first('dob_ad') }}</p>
            </div>
            <div class="col-lg-4">
                <div class="flex_1">
                    <label for="bs">BS</label>
                    <input type="text" id="datepicker-nepali" name="dob_bs" value="{{ old('dob_bs') }}" placeholder="YYYY-MM-DD" class=""  autocomplete="off">
                </div>
                <p class="text-danger">{{ $errors->first('dob_bs') }}</p>
            </div>
            <div class="col-lg-3">
                <div class="flex_1">
                    <label for="student_age">Age</label>
                    <input type="text" id="student_age" name="age" value="{{ old('age') }}">
                </div>
                <p class="text-danger">{{ $errors->first('age') }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="res-address"> Address </label>
                    <input type="text" id="res-address" name="address" placeholder=""  class="flex-grow-1" value="{{ old('address') }}">
                </div>
                <p class="text-danger">{{ $errors->first('address') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for=""> Phone </label>
                    <input type="text" id="" name="student_contact" value="{{ old('student_contact') }}" placeholder="" class="flex-grow-1">
                </div>
                <p class="text-danger">{{ $errors->first('student_contact') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="nationality">Employment Status</label>
                    <select name="employment_status" id="nationality" class="flex-grow-1" >
                        <option value="Employed" selected="selected">Employed</option>
                        <option value="Unemployed">Unemployed</option>

                    </select>
                </div>
                <p class="text-danger">{{ $errors->first('employment_status') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="nationality">Marital Status</label>
                    <select name="marital_status" id="nationality" class="flex-grow-1" >
                        <option value="Single" selected="selected">Single</option>
                        <option value="Married">Married</option>

                    </select>
                </div>
                <p class="text-danger">{{ $errors->first('marital_status') }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="dv_form_title">
                    <h2>FATHER'S INFORMATION</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="father_name" class="req-label fixed-label">Fathers's Name</label>
                    <input id="father_name" name="father_name" type="text" class="col" value="{{ old('father_name') }}">
                </div>
                <p class="text-danger">{{ $errors->first('father_name') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="f_cell" class=" req-label fixed-label"> Mobile No.</label>
                    <input id="f_cell" name="father_contact" value="{{ old('father_contact') }}" type="text" class="flex-grow-1" >
                </div>
                <p class="text-danger">{{ $errors->first('father_contact') }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="f_email" class="req-label fixed-label">Email</label>
                    <input id="f_email" name="father_email" type="text" value="{{ old('father_email') }}" class="col" >
                </div>
                <p class="text-danger">{{ $errors->first('father_email') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="f_occupation" class="req-label fixed-label">Occupation</label>
                    <input id="f_occupation" name="father_occupation" value="{{ old('father_occupation') }}" type="text" class="flex-grow-1" >
                </div>
                <p class="text-danger">{{ $errors->first('father_occupation') }}</p>

            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-12">
                <div class="dv_form_title">
                    <h2>MOTHER'S INFORMATION</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="mother_name" class="req-label fixed-label">Mother's Name </label>
                    <input id="mother_name" name="mother_name" type="text" value="{{ old('mother_name') }}" class="flex-grow-1" >
                </div>
                <p class="text-danger">{{ $errors->first('mother_name') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="m_cell" class="req-label fixed-label"> Mobile No.</label>
                    <input id="m_cell" name="mother_contact" type="text" value="{{ old('mother_contact') }}" class="flex-grow-1">
                </div>
                <p class="text-danger">{{ $errors->first('mother_contact') }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="m_email" class="req-label fixed-label">Email</label>
                    <input id="m_email" name="mother_email" type="text" value="{{ old('mother_email') }}" class="col" >
                </div>
                <p class="text-danger">{{ $errors->first('mother_email') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="m_occupation" class="req-label fixed-label">Occupation</label>
                    <input id="m_occupation" name="mother_occupation" type="text" value="{{ old('mother_occupation') }}" class="flex-grow-1" >
                </div>
                <p class="text-danger">{{ $errors->first('mother_occupation') }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="dv_form_title">
                    <h2>LOCAL GUARDIAN'S INFORMATION</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="guardian_name" class="req-label fixed-label">Local Guardian</label>
                    <input id="guardian_name" name="local_name" type="text" value="{{ old('local_name') }}" class="flex-grow-1" >
                </div>
                <p class="text-danger">{{ $errors->first('local_name') }}</p>
            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="g_cell" class="req-label fixed-label"> Mobile No.</label>
                    <input id="g_cell" name="local_contact" type="text" value="{{ old('local_contact') }}" class="flex-grow-1">
                </div>
                <p class="text-danger">{{ $errors->first('local_contact') }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="g_email" class="req-label fixed-label">Email</label>
                    <input id="g_email" name="local_email" type="text" value="{{ old('local_email') }}" class="col" >
                </div>
                <p class="text-danger">{{ $errors->first('local_email') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="g_occupation" class="req-label fixed-label">Occupation</label>
                    <input id="g_occupation" name="local_occupation" value="{{ old('local_occupation') }}" type="text" class="flex-grow-1" >
                </div>
                <p class="text-danger">{{ $errors->first('local_occupation') }}</p>

            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="dv_form_title">
                    <h2>LATEST ACADEMIC QUALIFICATION</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="last_school_0_name" class="req-label fixed-label">Name of Board/University</label>
                    <input id="last_school_0_name" name="previous_school" value="{{ old('previous_school') }}" type="text" class="flex-grow-1" >
                </div>
                <p class="text-danger">{{ $errors->first('previous_school') }}</p>
            </div>

            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="last_school_0_address" class="req-label fixed-label">Year of Passing</label>
                    <input id="last_school_0_address" name="passed_year" value="{{ old('passed_year') }}" type="text" class="flex-grow-1">
                </div>
                <p class="text-danger">{{ $errors->first('passed_year') }}</p>

            </div>
        </div>
        <div class="row">

            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="last_school_0_gpa" class="req-label fixed-label">DIVISION</label>
                    <input id="last_school_0_gpa" name="passed_division" type="text" value="{{ old('passed_division') }}" class="flex-grow-1">
                </div>
                <p class="text-danger">{{ $errors->first('passed_division') }}</p>

            </div>
            <div class="col-lg-6">
                <div class="flex_1">
                    <label for="last_school_0_gpa" class="req-label fixed-label">Percentage of Marks/GPA</label>
                    <input id="last_school_0_gpa" name="previous_gpa" type="text" value="{{ old('previous_gpa') }}" class="flex-grow-1">
                </div>
                <p class="text-danger">{{ $errors->first('previous_gpa') }}</p>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text_area_message">
                    <textarea name="message" id="query" cols="100" rows="2" style="width:100%;resize:none;padding:5px;" placeholder="Write your query">{{ old('message') }}</textarea>
                </div>
                <p class="text-danger">{{ $errors->first('message') }}</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="submit_button_wrapper">
                    <button type="submit" class="btn btn-primary">Apply Now</button>
                </div>
            </div>
        </div>
    </div>

</div>
</form>

@endsection
@push('scripts')

<script src="{{asset('frontend/plugins/nepali-date-selection/dist/nepaliDatePicker.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
</script>
<script>
    $("#datepicker-nepali").nepaliDatePicker();
</script>

<script>
    $(function() {
        $('#datepicker-english').datepicker();
    });
</script>
@endpush
