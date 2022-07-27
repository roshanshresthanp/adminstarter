<?php

namespace App\Http\Controllers;

use App\Models\EnrollCourse;
use Illuminate\Http\Request;

class EnrollCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = EnrollCourse::latest()->paginate(10);
        return view('backend.contact_mails.enroll-course', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnrollCourse  $enrollCourse
     * @return \Illuminate\Http\Response
     */
    public function show(EnrollCourse $enrollCourse)
    {
        return view('backend.contact_mails.enroll-show', ['enroll'=>$enrollCourse]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnrollCourse  $enrollCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(EnrollCourse $enrollCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnrollCourse  $enrollCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnrollCourse $enrollCourse)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnrollCourse  $enrollCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnrollCourse $enrollCourse)
    {
        $enrollCourse->delete();
        return redirect()->back()->with('success','Course enrollment has been deleted');
    }
}
