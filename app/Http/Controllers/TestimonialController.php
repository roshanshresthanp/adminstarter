<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimonials = Testimonial::latest()->paginate(10);
        return view('backend.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.testimonial.create');
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
            'company'=>'nullable|max:250',
            'staff_name'=>'required|max:250',
            'staff_position' => 'required|max:250',
            'title'=>'required|max:250',
            'message'=>'required|max:2000',
            'active' => 'nullable',
        ]);
        $input = $request->all();
        $input['publish_status'] = $request->active??0;
        Testimonial::create($input);
        return redirect()->route('testimonial.index')->with('success', 'Testimonial is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $testimonial = Testimonial::findorfail($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $testimonial = Testimonial::findorfail($id);
        $this->validate($request, [
            'company'=>'nullable|max:250',
            'staff_name'=>'required|max:250',
            'staff_position' => 'required|max:250',
            'title'=>'required|max:250',
            'message'=>'required',
            'active' => 'nullable'
        ]);

        $testimonial->update([
            'company'=>$request['company'],
            'staff_name'=>$request['staff_name'],
            'staff_position'=>$request['staff_position'],
            'title'=>$request['title'],
            'image' => $request->image,
            'message'=>$request['message'],
            'publish_status' => $request->active??0
        ]);
        $testimonial->save();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $testimonial = Testimonial::findorfail($id);
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully');
    }

    public function testimonialSearch(Request $request)
    {
        if(empty($request->search))
        $testimonials = Testimonial::latest()->paginate(10);
        else
        {
        $testimonials = Testimonial::where('company','LIKE','%'.$request->search.'%')->orWhere('staff_name','LIKE','%'.$request->search.'%')->latest()->paginate(10);
        }
        return view('backend.testimonial.index', compact('testimonials'));
    }
}
