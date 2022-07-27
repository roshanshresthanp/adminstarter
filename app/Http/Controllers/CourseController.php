<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLevel;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('backend.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('dsdsd');
        $cat = CourseCategory::latest()->get();
        return view('backend.courses.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            'course_category'=>'required|integer',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'semester'=>'nullable',
            'duration'=>'nullable',
            'show_on_menu'=>'required|integer'
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Course::create($input);
        return redirect()->route('courses.index')->with('success', 'Course information is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $courses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $course = Course::findOrFail($id);
        // return view('backend.courses.comment',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findorFail($id);
        $cat = CourseCategory::latest()->get();
        return view('backend.courses.create', compact('course','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            'course_category'=>'required|integer',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'semester'=>'nullable',
            'duration'=>'nullable',
            'show_on_menu'=>'required|integer'
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Course::findOrFail($id)->update($input);
        return redirect()->route('courses.index')->with('success', 'Course has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::findorFail($id)->delete();
        return redirect()->back()->with('success', 'Course has been deleted successfully.');
    }
}
