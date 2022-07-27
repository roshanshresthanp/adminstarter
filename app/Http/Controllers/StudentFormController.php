<?php

namespace App\Http\Controllers;

use App\Models\StudentForm;
use Illuminate\Http\Request;

class StudentFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = StudentForm::where('type','inquiry')->latest()->paginate(10);
        return view('backend.student-form.inquiry-index',compact('messages'));
    }

    public function admissionIndex()
    {
        $messages = StudentForm::where('type','admission')->latest()->paginate(10);
        return view('backend.student-form.admission-index',compact('messages'));
    }



    public function registrationIndex()
    {
        $messages = StudentForm::where('type','registration')->latest()->paginate(10);
        return view('backend.student-form.registration-index',compact('messages'));
    }

    public function registrationShow($id)
    {
        $enroll = StudentForm::find($id);
        return view('backend.student-form.registration-show',compact('enroll'));
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
     * @param  \App\Models\StudentForm  $studentForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enroll = StudentForm::find($id);
        return view('backend.student-form.inquiry-show',compact('enroll'));
    }

    public function admissionShow($id)
    {
        $enroll = StudentForm::find($id);
        return view('backend.student-form.admission-show',compact('enroll'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentForm  $studentForm
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentForm $studentForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentForm  $studentForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentForm $studentForm)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentForm  $studentForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentForm::find($id)->delete();
        return redirect()->back()->with('success','Student info has been deleted');
    }
}
