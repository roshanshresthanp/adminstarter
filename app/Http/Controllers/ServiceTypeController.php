<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ServiceTypeController extends Controller
{
    public function index()
    {
        $services = ServiceType::latest()->paginate(10);
        return view('backend.service-type.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service-type.create');
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
            $cover_image = $image->store('services', 'uploads');
            $input['image']= $cover_image;
        }

        $og_image = '';
        if($request->hasfile('og_image'))
        {
            $image = $request->file('og_image');
            $og_image = $image->store('services', 'uploads');
            $input['og_image'] = $og_image;
        }
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);

        ServiceType::create($input);

        return redirect()->route('service-type.index')->with('success', 'Service information is created successfully.');
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
        $service = ServiceType::findorFail($id);
        return view('backend.service-type.create', compact('service'));
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
            $cover_image = $image->store('services', 'uploads');
            $input['image']= $cover_image;
        }

        $og_image = '';
        if($request->hasfile('og_image'))
        {
            $image = $request->file('og_image');
            $og_image = $image->store('services', 'uploads');
            $input['og_image'] = $og_image;
        }
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);

        // ServiceType::create($input);
        ServiceType::findOrFail($id)->update($input);
        return redirect()->route('service-type.index')->with('success', 'Service Type is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_service = ServiceType::findorFail($id);
        // Storage::disk('uploads')->delete($existing_service->cover_image);
        // Storage::disk('uploads')->delete($existing_service->icon);
        // Storage::disk('uploads')->delete($existing_service->banner_image);

        $existing_service->delete();

        return redirect()->route('service-type.index')->with('success', 'Service type deleted successfully.');
    }
}
