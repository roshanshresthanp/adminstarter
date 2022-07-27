<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(5);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(gettype($request->slider_image));
        $this->validate($request, [
            'title'=>'nullable|max:200',
            'sub_title'=>'nullable|max:200',
            'slider_image' => 'required|string|max:250',
            'active' => 'nullable'
        ]);

        $slider = explode(',',$request->slider_image);
        $input = $request->all();
        $input['is_active'] = $request->active??0;
        foreach($slider as $slide)
        {
            $input['location'] = $slide;
            Slider::create($input);
        }
        return redirect()->route('slider.index')->with('success', 'Slider is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findorFail($id);
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'nullable|max:200',
            'sub_title'=>'nullable|max:200',
            'slider_image' => 'nullable|string|max:250',
            'active' => 'nullable'
        ]);
        $input = $request->all();
        $input['location'] = $request->slider_image;
        $input['is_active'] = $request->active??0;
        Slider::findOrFail($id)->update($input);
        return redirect()->route('slider.index')->with('success', 'Slider is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_slider = Slider::findorFail($id);
        Storage::disk('uploads')->delete($existing_slider->location);
        $existing_slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider is deleted successfully.');
    }
}
