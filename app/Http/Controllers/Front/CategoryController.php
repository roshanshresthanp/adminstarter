<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\News;
use App\Models\Team;
use App\Models\Content;
use App\Models\Album;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    private function getMeta($meta = [])
    {
        return [
            'meta_title' => $meta['meta_title']  ?? $meta['title'] ?? null,
            'meta_keyword' => $meta['meta_keywords']  ?? null,
            'meta_description' => $meta['meta_description']??$meta['description'] ?? null,
            'meta_keyphrase' =>  $meta['meta_keyphrase'] ?? null,
            'og_image' => $meta['og_image'] ?? $meta['image'] ?? null,
            'og_url' => route('index'),
            'og_site_name' =>  $meta['meta_title']  ?? $meta['title']??null,
            'twitter' => config('settings.twitter'),
        ];
    }

    public $keyValue = [
        'home' => 'home',
        'about' => 'about',
        'contact' => 'contact',
        'team' => 'team',
        'gallery' => 'gallery',
        'all-course' => 'allCourse',
        // 'services' => 'services',
        'blogs' => 'blogs',
        'page' => 'page',
        'message'=>'message',
        'course' => 'course',
    ];

    public function category($category)
    {
        // return $category;
        // if($category->category_slug=='message'){
        //     return $category->content_slug;

        // }else

        $category  = Menu::where('category_slug', $category)->firstOrFail();
        $requiredFunction =  $this->keyValue[$category->category_slug];
        try {
            return $this->$requiredFunction($category);
        } catch (\Throwable $th) {
            return  abort('404');
        }
    }



    private function course($category)
    {
        $course = Course::forMenu()->where('slug',$category->content_slug)->firstOrFail();
        $relatedCourses = Course::status()->where('course_category',$course->course_category)->latest()->take(5)->get();
        $meta = $this->getMeta($course);
        return view('frontend.course.course-detail',compact('course','relatedCourses','meta'));
    }


    private function home()
    {
        return redirect()->route('index');
    }

    private function about($category)
    {
        $abouts = Content::status()->where('content_type','About')->latest()->get();
        return view('frontend.about', compact('category', 'abouts'))
            ->with('meta', $this->getMeta($category));
    }
    public function allCourse($category)
    {
        $courseCats = CourseCategory::status()->with('course')->get();
        $meta = $this->getMeta($category);
        return view('frontend.course.courses', compact('category', 'courseCats','meta'));

    }





    private function contact($category)
    {
        return view('frontend.contact', compact('category'))
            ->with('meta', $this->getMeta($category));
    }

    private function blogs($category)
    {
        $blogs = Blog::blog()->status()->latest()->paginate(9);
        return view('frontend.blog.blog', compact('category', 'blogs'))
            ->with('meta', $this->getMeta($category));
    }

    private function team($category)
    {
        $teams = Team::status()->orderBy('in_order','asc')->get();
        return view('frontend.team.team', compact('category', 'teams'))
            ->with('meta', $this->getMeta($category));
    }

    // private function courses($category)
    // {
    //     // dd('hello');
    //     $portfolio = Portfolio::where('publish_status', '1')->latest()->paginate(6);
    //     return view('frontend.course', compact('category', 'portfolio'))
    //         ->with('meta', $this->getMeta($category));
    // }

    private function gallery($category)
    {
        $albums = Album::where('publish_status',1)->latest()->get();
        return view('frontend.gallery.galleryList', compact('category', 'albums'))
            ->with('meta', $this->getMeta($category));
    }

    public function page($category)
    {
        $data = Menu::where(['title_slug'=>$category,'publish_status'=>1])->first();
        $recentNews  = Blog::news()->status()->take(5)->latest()->get();
        $recentBlogs  = Blog::blog()->status()->take(5)->latest()->get();

        return view('frontend.page', compact('data','recentNews','recentBlogs'))
            ->with('meta', $this->getMeta($data));
    }
    public function courseAndMessage($category_slug,$content_slug)
    {
        if($category_slug=='message'){

            $message = Content::where(['delete_status'=>0,'content_url'=>$content_slug])->first();
            // return $category_slug;
            $meta = $this->getMeta($message);
            return view('frontend.chairman-message.detail',compact('message','meta'));
        }
        if($category_slug=='course'){
            $course = Course::status()->where('slug',$content_slug)->first();
            $relatedCourses = Course::status()->where('course_category',$course->course_category)->latest()->take(5)->get();
            $meta = $this->getMeta($course);
            return view('frontend.course.course-detail',compact('course','relatedCourses','meta'));

        }
    }

}
