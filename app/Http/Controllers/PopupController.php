<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popups = Popup::latest()->paginate(10);
        return view('backend.popup.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.popup.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'nullable',
            'description'    => 'nullable',
            'image' => 'required|string|max:250',
            'publish_status'=>'nullable',
            'link'=>'nullable',
            'show_on'=>'required'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        // $input['slug'] = Str::slug($request->title);
        Popup::create($input);

        return redirect()->route('popup.index')->with('success', 'Popup Image is created successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $popup = Popup::findorFail($id);
        return view('backend.popup.create', compact('popup'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'    => 'nullable',
            'description'    => 'nullable',
            'image' => 'required|string|max:250',
            'publish_status'=>'nullable',
            'link'=>'nullable',
            'show_on'=>'required'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        // $input['slug'] = Str::slug($request->title);
        Popup::findOrFail($id)->update($input);
        return redirect()->route('popup.index')->with('success', 'Popup has been updated successfully.');
    }

    public function destroy($id)
    {
        Popup::findorFail($id)->delete();
        return redirect()->route('popup.index')->with('success', 'Popup Image has been deleted successfully.');
    }
}
