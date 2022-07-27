<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentFormRequest;
use App\Models\Album;
use App\Models\AlbumImages;
use App\Models\Downloads;
use App\Models\Menu;
use App\Models\MissionMessages;
use App\Models\MailMessages;
use App\Mail\UserSubmissionMail;
use App\Models\Award;
use App\Models\AwardCategory;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Booking;
use App\Models\News;
use App\Models\Partners;
use App\Models\Pricing;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Extra;
use App\Models\Country;
use App\Models\Course;
use App\Models\Destination;
use App\Models\Learn;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ChooseUs;
use App\Models\Comment;
use App\Models\Content;
use App\Models\CourseBooking;
use App\Models\CourseCategory;
use App\Models\EnrollCourse;
use App\Models\Feature;
use App\Models\Portfolio;
use App\Models\ProductBooking;
use App\Models\StudentForm;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use LDAP\Result;

class FrontController extends Controller
{
    public function content($type)
    {
        return Content::status()->where('content_type',$type)->first();
    }
    private function getMeta($meta = [])
    {
        return [
            'meta_title' => $meta['meta_title']  ?? $meta['title']??$meta['name'],
            'meta_keyword' => $meta['meta_keywords'] ,
            'meta_description' => $meta['meta_description'],
            'meta_keyphrase' =>  $meta['meta_keyphrase'],
            'og_image' => $meta['og_image'],
            'og_url' => route('index'),
            'og_site_name' => $meta['meta_title']  ?? $meta['title'],
            'twitter' => config('settings.twitter'),
        ];
    }

    public function index()
    {
        $sliders = Slider::where('is_active', 1)->latest()->limit(5)->get();
        $partners = Partners::latest()->take(10)->get();
        $features = Feature::where('publish_status',1)->take(4)->latest()->get();
        $testimonials = Testimonial::where('publish_status',1)->latest()->get();
        $blogs = Blog::blog()->status()->take(6)->get();
        $news = Blog::news()->status()->take(6)->get();
        $notices = Blog::notice()->status()->take(6)->get();
        $courseCats = CourseCategory::status()->with('course')->latest()->get();
        $whyUs =$this->content('Why-Choose-Us');
        $adv = $this->content('Benefit-Advantage');
        $messages = Content::status()->where('content_type','Message')->get();
        $enroll = $this->content('Enroll');

        // $data = Menu::where(['category_slug'=>'home'])->first();
        $meta = $this->getMeta(Setting::first());
        // return $meta;
        return view('frontend.index', compact('meta','adv','whyUs','enroll','messages','features','notices','news','sliders','partners','blogs','testimonials','courseCats'));
    }

    public function inquiryform()
    {
        $courseCats = CourseCategory::status()->with('course')->get();
        $data = Content::status()->where('content_type','Inquiry-Form')->first();
        return view('frontend.student-form.enquiry-form',['data'=>$data,'courseCats'=>$courseCats]);
    }
    public function admissionform()
    {
        $courseCats = CourseCategory::status()->with('course')->get();
        $data = Content::status()->where('content_type','Admission-Form')->first();
        return view('frontend.student-form.admission-form',['data'=>$data,'courseCats'=>$courseCats]);
    }

    public function registrationform()
    {
        $courseCats = CourseCategory::status()->with('course')->get();
        $data = Content::status()->where('content_type','Pre-Registration-Form')->first();
        return view('frontend.student-form.pre-registration',['data'=>$data,'courseCats'=>$courseCats]);
    }

    public function applyformSubmit(StudentFormRequest $request)
    {
        try{
            $input = $request->all();

            if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $input['image'] = $image->store('enroll', 'uploads');
        }
            $input['dob_bs'] = date('Y-m-d',strtotime($request->dob_bs));
            $input['dob_ad'] = date('Y-m-d',strtotime($request->dob_ad));
            $reg =   StudentForm::create($input);



            $data['email'] =  Setting::first()->email;
            $userEmail = $request->email;
            Mail::send('emails.adminFormEmail', compact('userEmail'), function ($message) use ($data)
             {
            $message->to($data["email"])
                ->subject("Form Message Received.");
            });

        $data['email'] = $request->email;
        Mail::send('emails.userFormEmail', $data, function($message)use($data)
        {
            $message->to($data["email"])
                    ->subject("Form Message Received.");
        });


            return redirect()->back()->with('success','Your form has been submitted successfully.');

        }catch(\Exception $e)
        {
            return redirect()->back()->with('error',$e->getMessage());
            // return redirect()->back()->with('error','Sorry we are not able to accept form at this type. Please tyr again later');
        }
    }

    public function messageSave(Request $request){
        $this->validate($request,[
            'name' => 'required|max:250',
            'email' => 'required|max:250|email',
            'subject' => 'nullable|max:250',
            'message' => 'required|max:2000',
            'contact_no'=>'nullable|numeric'
        ]);

        $input = $request->all();
        MailMessages::create($input);
        $data['email'] = $request->email;
        Mail::send('emails.usersubmissionmail', $data, function($message)use($data)
        {
            $message->to($data["email"])
                    ->subject("Message Received.");
        });

        $data['email'] =  Setting::first()->email;
        $userEmail = $request->email;
        Mail::send('emails.adminContact', compact('userEmail'), function ($message) use ($data) {
            $message->to($data["email"])
                ->subject("Message Received.");
        });

        return redirect()->back()->with('success', 'Thank you for your mail. We will get back to you soon.');
    }
    public function enrollCourseSave(Request $request){

        // return $request->all();
        $this->validate($request,[
            'name' => 'required|string|max:250',
            'email' => 'required|max:250|email',
            'course_id' => 'required|integer|max:250',
            'contact'=>'nullable|max:250',
            'message'=>'nullable|string|max:1000'
        ]);
        EnrollCourse::create($request->all());
        $data['email'] = $request->email;
        Mail::send('emails.userEnrollCourse', $data, function($message)use($data)
        {
            $message->to($data["email"])
                    ->subject("Message Received.");
        });
        $data['email'] =  Setting::first()->email;
        $userEmail = $request->email;
        Mail::send('emails.adminEnrollCourse', compact('userEmail'), function ($message) use ($data) {
            $message->to($data["email"])
                ->subject("Course Enrollment Message.");
        });

        return redirect()->back()->with('success', 'Thank you for your course enrollment request. We will get back to you soon.');
    }

    public function teamDetail($slug)
    {
        $team = Team::status()->where('slug', $slug)->firstorfail();
        $meta = $this->getMeta($team);
        return view('frontend.team.show', compact('team', 'meta'));
    }

    public function blogDetail($slug){
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $recent  = Blog::status()->take(5)->latest()->get();
        $blogCats = BlogCategory::where('publish_status',1)->take(5)->latest()->get();
        $meta = $this->getMeta($blog);
        // return $meta;
        return view('frontend.blog.show',compact('blog','meta','recent','blogCats'));
    }

    public function homeSearch(Request $request)
    {
        $courses = Course::status()->where('title','LIKE','%'.$request->search.'%')->get();
        return view('frontend.home-search',compact('courses'));
    }

    // public function blogSearch(Request $request){
    //     $recent = Blog::where('title','LIKE','%'.$request->search.'%')->latest()->take(5)->get();
    //     return view('frontend.blog.searchAjax',compact('recent'));
    // }

    public function subscribe(Request $request)
    {
        $data = $this->validate(request(), [
            'email' => 'required|email|unique:subscribers,email',
        ],
        $message=[
            'email.unique'=>'You have already been subscribed.'
        ]);

        $data['email'] = $request->email;
        Mail::send('emails.userSubscribe', $data, function ($message) use ($data) {
            $message->to($data["email"])
                ->subject("Message Received.");
        });
        // $data['email'] =  Setting::find(1)->email;
        // $userEmail = $request->email;
        // Mail::send('emails.adminSubscribe', compact('userEmail'), function ($message) use ($data) {
        //     $message->to($data["email"])
        //         ->subject("Subscried Message.");
        // });

        $subscriber = new Subscribers();
        $subscriber->email = $data['email'];
        $subscriber->is_read = 0;
        $subscriber->save();

        return redirect()->back()->with('success', 'Thank you for your subscription. We will get back to you soon.');
    }

    public function imageDetail($slug)
    {
        $image = Album::where('title_slug',$slug)->firstOrFail();
        $meta = $this->getMeta($image);
        // return $meta;
        return view('frontend.gallery.gallery',compact('image','meta'));
    }
    public function courseDetail($slug)
    {
        $course = Course::status()->where('slug',$slug)->firstOrFail();
        $relatedCourses = Course::status()->where('course_category',$course->course_category)->latest()->take(5)->get();
        $meta = $this->getMeta($course);
        return view('frontend.course.course-detail',compact('course','relatedCourses','meta'));
    }

    public function featureDetail($slug)
    {

        $feature = Feature::where('slug',$slug)->first();
        $otherFeatures = Feature::where('id','!=',$feature->id)->latest()->take(10)->get();
        // $meta = $this->getMeta($course);
        return view('frontend.feature.show',compact('feature','otherFeatures'));
    }


    public function messageDetail($slug)
    {
           $message =  Content::status()->where(['content_type'=>'Message','content_url'=>$slug])->firstOrFail();
            return view('frontend.chairman-message.detail',compact('message'))
                ->with('meta', $this->getMeta($message));
    }

    public function lists($slug)
    {
        if($slug=='notice'){
            $datas = Blog::notice()->status()->paginate(9);
            return view('frontend.blog.news',compact('datas','slug'));

        }elseif($slug=='news'){
            $datas = Blog::news()->status()->paginate(9);
            return view('frontend.blog.news',compact('datas','slug'));
        }
    }

    public function catBlogs($slug)
    {
        $cat = BlogCategory::where(['publish_status'=>1,'slug'=>$slug])->firstOrFail();
        $blogs = Blog::blog()->status()->where('blog_category',$cat->id)->paginate(9);
        $meta = $this->getMeta($cat);     return view('frontend.blog.catBlogs',compact('cat','blogs','meta'));
    }



    // public function commentSave(Request $request)
    // {
    //     $this->validate($request, [
    //         'name'=>"required|max:255",
    //         'phone'=>'nullable',
    //         'email'=>'required|email|max:250',
    //         // 'subject'=>'nullable|max:200',
    //         'message'=>'required|max:500',
    //         // 'g-recaptcha-response'=>''
    //     ]);
    //         try{
    //             $input = $request->all();
    //             Comment::create($input);
    //             return redirect()->back()->with('success','Comment has been sent for review');
    //         }catch(\Exception $error){
    //         return redirect()->back()->with('error',$error->getMessage());
    //         }
    // }

}
