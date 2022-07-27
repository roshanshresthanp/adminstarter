<?php

namespace App\Http\Controllers;

use App\Models\MailMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = MailMessages::latest()->paginate(10);
        MailMessages::where('is_read',0)->update(['is_read'=>1]);
        return view('backend.contact_mails.index', compact('messages'));
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
        $mail = MailMessages::findOrFail($id);
        return view('backend.contact_mails.show', compact('mail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailMessages  $mailMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(MailMessages $mailMessages)
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
    public function update(Request $request, MailMessages $mailMessages)
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
        MailMessages::findOrFail($id)->delete();
        return redirect()->back()->with('success','Mail info has been deleted');
    }
}
