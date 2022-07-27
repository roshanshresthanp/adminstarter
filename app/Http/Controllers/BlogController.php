<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::blog()->paginate(10);
        return view('backend.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = BlogCategory::latest()->get();
        return view('backend.blogs.create',compact('cat'));
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
            'blog_category'=>'required|integer',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'blog_type'=>'required',
            'posted_by'=>'nullable|max:250'
        ]);
        // $image = $request->cover_image;
        // $explode = explode($image, )
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Blog::create($input);
        return redirect()->route('blogs.index')->with('success', 'Blog information is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.comment',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findorFail($id);
        $cat = BlogCategory::latest()->get();
        // $types = json_decode($blog->blog_type);
        // return $types;
        return view('backend.blogs.create', compact('blog','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            'blog_category'=>'required|integer',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'blog_type'=>'required',
            'posted_by'=>'nullable|max:255'
        ]);
                // return $request->posted_by;

        $input = $request->all();
        // $input['blog_type']= json_encode($request->blog_type);
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Blog::findOrFail($id)->update($input);
        return redirect()->route('blogs.index')->with('success', 'Blog has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_service = Blog::findorFail($id);
        $existing_service->delete();
        return redirect()->back()->with('success', 'Blog has been deleted successfully.');
    }
}
