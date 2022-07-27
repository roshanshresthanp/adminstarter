<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogs = BlogCategory::latest()->paginate(10);
        return view('backend.blog-category.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog-category.create');
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
        BlogCategory::create($input);

        return redirect()->route('blog-category.index')->with('success', 'Blog category is created successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $blog = BlogCategory::findorFail($id);
        return view('backend.blog-category.create', compact('blog'));
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
        BlogCategory::findOrFail($id)->update($input);
        return redirect()->route('blog-category.index')->with('success', 'Blog category has been updated successfully.');
    }

    
    public function destroy($id)
    {
        BlogCategory::findorFail($id)->delete();
        return redirect()->route('blog-category.index')->with('success', 'Blog category has been deleted successfully.');
    }
}
