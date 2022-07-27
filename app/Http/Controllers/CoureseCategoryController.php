<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CoureseCategoryController extends Controller
{
    public function index()
    {
        $cats = CourseCategory::latest()->paginate(10);
        return view('backend.course-category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.course-category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'description'    => 'nullable',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' =>'nullable|string|max:250',
            'image' => 'nullable|string|max:250',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);
        CourseCategory::create($input);

        return redirect()->route('course-category.index')->with('success', 'Course category is created successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $course = CourseCategory::findorFail($id);
        return view('backend.course-category.create', compact('course'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'    => 'required',
            'description'    => 'nullable',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' =>'nullable|string|max:250',
            'image' => 'nullable|string|max:250',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);
        CourseCategory::findOrFail($id)->update($input);
        return redirect()->route('course-category.index')->with('success', 'Course category has been updated successfully.');
    }


    public function destroy($id)
    {
        CourseCategory::findorFail($id)->delete();
        return redirect()->route('course-category.index')->with('success', 'Course category has been deleted successfully.');
    }

}
