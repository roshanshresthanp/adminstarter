<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partners::latest()->paginate(10);
        return view('backend.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partners.create');
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
            'partner_logo' => 'required|string|max:250',
            'partner_name' => 'required|string|max:250'
        ]);
        // $input = $request->all();
        // if($request->hasfile('partner_logo'))
        // {
        //     $image = $request->file('partner_logo');
        //     $input['partner_logo'] = $image->store('partner_logo', 'uploads');
        // }
        Partners::create($request->all());
        return redirect()->route('partner.index')->with('success', 'Partner information saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function show(Partners $partners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $existing_partner = Partners::findorFail($id);
        return view('backend.partners.create', compact('existing_partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'partner_logo' => 'required',
            'partner_name' => 'required'
        ]);
        Partners::findorFail($id)->update($request->all());
        return redirect()->route('partner.index')->with('success', 'Partner information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partners::findOrFail($id)->delete();
        return redirect()->route('partner.index')->with('success', 'Partner information is deleted successfully.');
    }
}
