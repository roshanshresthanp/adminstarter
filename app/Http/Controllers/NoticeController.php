<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Blog::notice()->paginate(10);
        return view('backend.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = BlogCategory::latest()->get();
        return view('backend.notice.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'cover_image' => 'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'title'    => 'required',
            'description'    => 'required',
            // 'blog_category'=>'required|integer',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'blog_type'=>'required',
            'posted_by'=>'nullable|max:250'
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['blog_category'] = 0;
        // $input['blog_type']= json_encode($request->blog_type);
        $input['publish_status']= $request->publish_status??0;
        Blog::create($input);
        return redirect()->route('notices.index')->with('success', 'Notice is created successfully.');
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
        // $blog = Blog::findOrFail($id);
        // return view('backend.blogs.comment',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Blog::findorFail($id);
        $cat = BlogCategory::latest()->get();
        return view('backend.notice.create', compact('notice','cat'));
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
            // 'blog_category'=>'required|integer',
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
        $input['blog_category'] = 0;
        $input['slug'] = Str::slug($request->title);
        $input['publish_status']= $request->publish_status??0;
        Blog::findOrFail($id)->update($input);
        return redirect()->route('notices.index')->with('success', 'Notice has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::findorFail($id)->delete();
        return redirect()->back()->with('success', 'Notice has been deleted successfully.');
    }
}
