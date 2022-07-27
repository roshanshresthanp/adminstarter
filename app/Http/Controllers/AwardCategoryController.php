<?php

namespace App\Http\Controllers;

use App\Models\AwardCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AwardCategoryController extends Controller
{
    public function index()
    {
        $awards = AwardCategory::latest()->paginate(10);
        return view('backend.award-type.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.award-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $this->validate($request, [
            'title'    => 'required',
            'description'    => 'nullable',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'mimes:png,jpg,jpeg',
            'image' => 'mimes:svg,png,jpg,jpeg',
            'publish_status'=>'nullable'
        ]);

        $cover_image = '';
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $cover_image = $image->store('awards', 'uploads');
            $input['image']= $cover_image;
        }

        $og_image = '';
        if($request->hasfile('og_image'))
        {
            $image = $request->file('og_image');
            $og_image = $image->store('awards', 'uploads');
            $input['og_image'] = $og_image;
        }
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);

        AwardCategory::create($input);
        return redirect()->route('award-category.index')->with('success', 'Award category has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $award = AwardCategory::findorFail($id);
        return view('backend.award-type.create', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        // dd($input);
        
        $this->validate($request, [
            'title'    => 'required',
            'description'    => 'nullable',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'mimes:png,jpg,jpeg',
            'image' => 'mimes:svg,png,jpg,jpeg',
            'publish_status'=>'nullable'
        ]);

        $cover_image = '';
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $cover_image = $image->store('awards', 'uploads');
            $input['image']= $cover_image;
        }

        $og_image = '';
        if($request->hasfile('og_image'))
        {
            $image = $request->file('og_image');
            $og_image = $image->store('awards', 'uploads');
            $input['og_image'] = $og_image;
        }
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);

        // ServiceType::create($input);
        AwardCategory::findOrFail($id)->update($input);
        return redirect()->route('award-category.index')->with('success', 'Award Category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AwardCategory::findorFail($id)->delete();
        return redirect()->route('award-category.index')->with('success', 'Award Category has been deleted successfully.');
    }
}
