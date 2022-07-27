<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('backend.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.portfolio.create');
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
            'title'    => 'required',
            'link' => 'nullable',
            'description'    => 'nullable',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'mimes:png,jpg,jpeg',
            'image' => 'mimes:svg,png,jpg,jpeg',
            'publish_status'=>'nullable'
        ]);
        $input = $request->all();
        
        if($request->hasfile('image'))
        {   $cover_image = '';
            $image = $request->file('image');
            $cover_image = $image->store('services', 'uploads');
            $input['image']= $cover_image;
        }

        if($request->hasfile('og_image'))
        {   $og_image = '';
            $image = $request->file('og_image');
            $og_image = $image->store('services', 'uploads');
            $input['og_image'] = $og_image;
        }
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);

        Portfolio::create($input);
        return redirect()->route('portfolio.index')->with('success', 'Portfolio information is created successfully.');
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
        $portfolio = Portfolio::findorFail($id);
        return view('backend.portfolio.create', compact('portfolio'));
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
        
        // dd($input);
        $this->validate($request, [
            'title'    => 'required',
            'link' => 'nullable',
            'description'    => 'nullable',
            'meta_title'  => 'nullable',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'mimes:png,jpg,jpeg',
            'image' => 'mimes:svg,png,jpg,jpeg',
            'publish_status'=>'nullable'
        ]);
        $input = $request->all();
        
        if($request->hasfile('image'))
        {
            $cover_image = '';
            $image = $request->file('image');
            $cover_image = $image->store('services', 'uploads');
            $input['image']= $cover_image;
        }

        if($request->hasfile('og_image'))
        {
            $og_image = '';
            $image = $request->file('og_image');
            $og_image = $image->store('services', 'uploads');
            $input['og_image'] = $og_image;
        }
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);

        Portfolio::findOrFail($id)->update($input);
        return redirect()->route('portfolio.index')->with('success', 'Portfolio is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portfolio::findorFail($id)->delete(); 
        return redirect()->route('portfolio.index')->with('success', 'Portfolio is deleted successfully.');
    }
}
