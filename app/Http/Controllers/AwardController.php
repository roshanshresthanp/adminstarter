<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\AwardCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::latest()->paginate(10);
        return view('backend.awards.index', compact('awards'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = AwardCategory::all();
        return view('backend.awards.create',compact('cats'));
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
        $this->validate($request, [
            'title'=>'required',
            'cover_image' => 'mimes:png,jpg,jpeg',
            // 'icon' => 'image|mimes:png,jpg,jpeg,svg',
            'banner_image' => 'image|mimes:png,jpg,jpeg',
            'title'    => 'required|max:255',
            'description'    => 'required',
            'award_category_id'=>'required|integer',
            'meta_title'  => '',
            'meta_keywords'  => '',
            'meta_description'  => '',
            'og_image' => 'mimes:png,jpg,jpeg',
        ]);
        $input = $request->all();
        if($request->hasfile('cover_image'))
        {  
            $image = $request->file('cover_image');
            $input['cover_image'] = $image->store('awards', 'uploads');
        }

        if($request->hasfile('banner_image'))
        {
            $image = $request->file('banner_image');
            $input['banner_image'] = $image->store('awards', 'uploads');
        }

        if($request->hasfile('og_image'))
        {
            $image = $request->file('og_image');
            $input['og_image'] = $image->store('awards', 'uploads');
        }
            $input['slug'] = Str::slug($request->title);

        // $awards = Award::create([
        //     'cover_image' => $cover_image,
        //     'title' => $request['title'],
        //     'slug' => Str::slug($request->title),
        //     'description' => $request['description'],
        //     'publish_status'=>$request->publish_status ?? 0,
        //     'banner_image' => $banner_image,
        //     'award_category_id'=>$request->award_category_id,
        //     'meta_title' => $request['meta_title'],
        //     'meta_keywords' => $request['meta_keywords'],
        //     'meta_description' => $request['meta_description'],
        //     'og_image' => $og_image,
        // ]);

        // $awards->save();
        Award::create($input);
        return redirect()->route('awards.index')->with('success', 'Award information has been stored successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Award  $awards
     * @return \Illuminate\Http\Response
     */
    public function show(Award $awards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Award  $awards
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $award = Award::findorFail($id);
        $cats = AwardCategory::latest()->get();
        return view('backend.awards.create', compact('award','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Award  $awards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $existing_service = Award::findorFail($id);
        $this->validate($request, [
            'cover_image' => 'nullable|mimes:png,jpg,jpeg',
            'banner_image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'title'    => 'required|max:255',
            'award_category_id'=>'required|integer',
            'description'    => 'required',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|mimes:png,jpg,jpeg,svg',
        ]);
        // dd($request->all());
        $cover_image = '';
        if($request->hasfile('cover_image'))
        {
            $image = $request->file('cover_image');
            $cover_image = $image->store('awards', 'uploads');
        }
        else
        {
            $cover_image = $existing_service->cover_image;
        }

        $banner_image = '';
        if($request->hasfile('banner_image'))
        {
            $image = $request->file('banner_image');
            $banner_image = $image->store('awards', 'uploads');
        }else{
            $banner_image = $existing_service->banner_image;
        }

        $og_image = '';
        if($request->hasfile('og_image'))
        {
            $image = $request->file('og_image');
            $og_image = $image->store('awards', 'uploads');
        }
        else
        {
            $og_image = $existing_service->og_image;
        }

        $existing_service->update([
            'cover_image' => $cover_image,
            'title' => $request['title'],
            'slug' => Str::slug($request->title),
            'description' => $request['description'],
            'publish_status'=>$request->publish_status ?? 0,
            'banner_image' => $banner_image,
            'award_category_id'=>$request->award_category_id,
            'meta_title' => $request['meta_title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'og_image' => $og_image,
        ]);

        return redirect()->route('awards.index')->with('success', 'Award information has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Award  $awards
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_service = Award::findorFail($id);
        // Storage::disk('uploads')->delete($existing_service->cover_image);
        // Storage::disk('uploads')->delete($existing_service->icon);
        // Storage::disk('uploads')->delete($existing_service->banner_image);

        $existing_service->delete();

        return redirect()->back()->with('success', 'Service information deleted successfully.');
    }
}
