<?php

namespace App\Http\Controllers;

use App\Models\CourseBooking;
use Illuminate\Http\Request;

class CourseBookingController extends Controller
{
    public function index()
    {
        // dd('dssdsd');
        $unread_messages = CourseBooking::where('is_read', 0)->get();
        foreach ($unread_messages as $unread) {
            $unread->update(['is_read' => 1]);
        }

        $bookings = CourseBooking::latest()->paginate(10);
        return view('backend.booking-course.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
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

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailMessages  $mailMessages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = CourseBooking::find($id);
        // dd($booking);
        return view('backend.booking-course.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailMessages  $mailMessages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailMessages  $mailMessages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailMessages  $mailMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseBooking::findOrFail($id)->delete();
        return redirect()->back()->with('success','Booking details has been deleted');
    }
}
