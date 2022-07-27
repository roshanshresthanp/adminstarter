<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->paginate(10);
        return view('backend.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.features.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'description'    => 'nullable',
            'image' => 'nullable|string|max:250',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);
        Feature::create($input);

        return redirect()->route('features.index')->with('success', 'Feature is created successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $feature = Feature::findorFail($id);
        return view('backend.features.create', compact('feature'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'    => 'required',
            'description'    => 'nullable',
            'image' => 'nullable|string|max:250',
            'publish_status'=>'nullable'
        ]);

        $input = $request->all();
        $input['publish_status']=$request->publish_status?? 0;
        $input['slug'] = Str::slug($request->title);
        Feature::findOrFail($id)->update($input);
        return redirect()->route('features.index')->with('success', 'Feature has been updated successfully.');
    }


    public function destroy($id)
    {
        Feature::findorFail($id)->delete();
        return redirect()->route('features.index')->with('success', 'Feature has been deleted successfully.');
    }
}
