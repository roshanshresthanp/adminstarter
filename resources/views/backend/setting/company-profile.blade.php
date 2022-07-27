<form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="row">
       <div class="col-md-6">
           <div class="form-group">
               <label for="company_name">Name :</label>
               <input type="text" class="form-control" name="company_name" value="{{ $setting->company_name }}">
               <p class="text-danger">
                   {{ $errors->first('company_name') }}
               </p>
           </div>
       </div>

       <div class="col-md-6">
           <div class="form-group">
               <label for="contact_no">Contact no. :</label>
               <input type="text" class="form-control" name="contact_no" value="{{ $setting->contact_no }}" placeholder="Enter contact number" >
               <p class="text-danger">
                   {{ $errors->first('contact_no') }}
               </p>
           </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
            <label for="contact_no">Mobile no. :</label>
            <input type="text" class="form-control" name="phone" value="{{$setting->phone }}" placeholder="Enter mobile number" >
            <p class="text-danger">
                {{ $errors->first('phone') }}
            </p>
        </div>
    </div>
       <div class="col-md-6">
           <div class="form-group">
               <label for="email">Email:</label>
               <input type=4text" class="form-control" name="email" value="{{$setting->email }}" placeholder="Enter Email" >
               <p class="text-danger">
                   {{ $errors->first('email') }}
               </p>
           </div>
       </div>

       <div class="col-md-4">
           <div class="form-group">
               <label for="pan_vat">PAN / VAT:</label>
               <input type="text" class="form-control" value="{{ $setting->pan_vat }}" name="pan_vat" placeholder="Enter PAN">
               <p class="text-danger">
                   {{ $errors->first('pan_Vat') }}
               </p>
           </div>
       </div>
       <div class="col-md-4">
        <div class="form-group">
            <label for="map_url">Post box no.:</label>
            <input type="text" class="form-control" name="post_no" value="{{ $setting->post_no }}" placeholder="Post box no">
            <p class="text-danger">
             {{ $errors->first('post_no') }}
             </p>
         </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="pan_vat">School time:</label>
            <input type="text" class="form-control" value="{{ $setting->opening_time }}" name="opening_time" placeholder="eg. 10:00AM - 5:00PM">
            <p class="text-danger">
                {{ $errors->first('opening_time') }}
            </p>
        </div>
    </div>
       <div class="col-md-4">
           <div class="form-group">
               <label for="province">Province no:.</label>
               <select name="province" class="form-control province">
                   <option value="">--Select a province--</option>
                   @foreach ($provinces as $province)
                       <option value="{{ $province->id }}"{{ $province->id == $setting->province_no ? 'selected' : '' }}>{{ $province->eng_name }}</option>
                   @endforeach
               </select>
               <p class="text-danger">
                   {{ $errors->first('province') }}
               </p>
           </div>
       </div>

       <div class="col-md-4">
           <div class="form-group">
               <label for="district">Districts:</label>
               <select name="district" class="form-control" id="district">
                   @foreach ($districts as $district)
                       <option value="{{ $district->id }}"{{ $district->id == $setting->district_no ? 'selected' : '' }}>{{ $district->dist_name }}</option>
                   @endforeach
               </select>
               <p class="text-danger">
                   {{ $errors->first('district') }}
               </p>
           </div>
       </div>

       <div class="col-md-4">
           <div class="form-group">
               <label for="local_address">Local Address :</label>
               <input type="text" name="local_address" class="form-control" value="{{ $setting->local_address }}" placeholder="Enter Local address">
               <p class="text-danger">
                   {{ $errors->first('local_address') }}
               </p>
           </div>
       </div>

       <div class="col-md-12">
           <div class="form-group">
               <label for="brief_description">Brief Description (shown on footer):</label>
               <textarea name="brief_description" rows="2" class="form-control" placeholder="Brief description..">{{ $setting->brief_description }}</textarea>
               <p class="text-danger">
                {{ $errors->first('brief_description') }}
                </p>
            </div>
       </div>
       {{-- <div class="col-md-6">
           <div class="form-group">
               <label for="company_logo">Site Logo:</label>
               <input type="file" class="form-control" name="company_logo" id="" onchange="loadLogo(event)">
           </div>
       </div> --}}
       <div class="col-md-6">
           <label for="company_logo">Site Logo:</label>
           <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm" >
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
               <input id="thumbnail" class="form-control" value="{{$setting->company_logo}}" type="text" name="company_logo"  onchange="loadLogo()" readonly>
             </div>
             <img id="holder" style="margin-top:15px;max-height:100px;">
             <p class="text-danger">
               {{ $errors->first('company_logo') }}
           </p>
       </div>

       <div class="col-md-3">
           <label for="">Recent Logo:</label> <br>
           <img id="company_logo_output" src="{{$setting->company_logo??Storage::disk('uploads')->url('noimage.jpg') }}" style="height: 100px;" src="">
       </div>

       <div class="col-md-6">
           <label for="footer_logo">Footer Logo:</label>
           <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary lfm" >
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
               <input id="thumbnail1" class="form-control" value="{{$setting->footer_logo}}" type="text" name="footer_logo" onchange="loadFooterLogo()" readonly>
             </div>
             <img id="holder1" style="margin-top:15px;max-height:100px;">
             <p class="text-danger">
               {{ $errors->first('footer_logo') }}
           </p>
       </div>
       <div class="col-md-3">
           <label for="">Recent Footer Logo:</label> <br>
           <img id="footer_logo_output" style="height: 100px;" src="{{$setting->footer_logo??Storage::disk('uploads')->url('noimage.jpg')}}">
       </div>


       <div class="col-md-6">
           <label for="company_favicon">Site Favicon:</label>
           <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm" data-input="thumbnail11" data-preview="holder11" class="btn btn-primary lfm" >
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
               <input id="thumbnail11" class="form-control" value="{{$setting->company_favicon}}" type="text" name="company_favicon" onchange="loadFavicon()" readonly>
             </div>
             <img id="holder11" style="margin-top:15px;max-height:100px;">
             <p class="text-danger">
               {{ $errors->first('company_favicon') }}
           </p>
       </div>

       <div class="col-md-3 mt-2">
           <label for="">Recent Favicon:</label> <br>
           <img id="company_favicon_output" style="height: 100px;" src="{{$setting->company_favicon??Storage::disk('uploads')->url('noimage.jpg')}}">
       </div>



       {{-- <div class="col-md-4">
           <div class="form-group">
               <label for="projects_completed">Projects Completed (in number) : </label>
               <input type="number" class="form-control" name="projects_completed" placeholder="Projects completed" value="{{ $setting->projects_completed }}">
               <p class="text-danger">
                   {{ $errors->first('projects_completed') }}
               </p>
           </div>
       </div> --}}

       {{-- <div class="col-md-4">
           <div class="form-group">
               <label for="total_employees">Total Employees (in number) : </label>
               <input type="number" class="form-control" name="total_employees" placeholder="Total Employees in number." value="{{ $setting->total_employees }}">
               <p class="text-danger">
                   {{ $errors->first('total_employees') }}
               </p>
           </div>
       </div> --}}


       <div class="col-md-12 text-center mt-4">
           <hr>
           <h3>Map URL</h3>
           <hr>
       </div>

       <div class="col-md-12">
           <div class="form-group">
               <label for="map_url">Google Map Url:</label>
               <input type="text" class="form-control" name="map_url" value="{{ $setting->map_url }}" placeholder="Enter location google map url">
           </div>
       </div>
       <div class="col-md-12 text-center mt-4">
           <button type="submit" class="btn btn-success" name="companySetting">Submit</button>
       </div>
    </div>

</form>
