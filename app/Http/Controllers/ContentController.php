<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            // dd($request->search);
            $content = Content::where('content_title','LIKE','%'.$request->search.'%')
            ->orWhere('content_type','LIKE','%'.$request->search.'%')->latest()->get();
            return view('backend.content.searchAjax', compact('content'));

        }
        $content = Content::latest()->where('delete_status', '0')->paginate(10);
        return view('backend.content.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contentTypes = Content::contentType;
        // return $contentTypes;
        return view('backend.content.create',compact('contentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'featured_img' => 'nullable|string|max:250',
            'freezone_img' => 'nullable|string|max:250',
            'content_body' => 'nullable',
            'content_title' => 'required',
        ]);
        $input = $request->all();
        // return $input;

        $input['show_on_menu'] = 'N';
        $input['publish_status'] = $request->publish_status??0;

        $input['content_url'] = Str::slug($request['content_title']);
        $contents = Content::create($input);

        return redirect()->route('content.index')->with('success', 'Content Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $content = Content::findorfail($id);
        $contentTypes = Content::contentType;
        return view('backend.content.edit', compact('content','contentTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'featured_img' => 'nullable|string|max:250',
            'freezone_img' => 'nullable|string|max:250',
            'content_body' => 'nullable',
            'content_title' => 'nullable',
            'content_type'=>'required',
            // 'description'=>'required',
        ]);
        $contents = Content::findorfail($id);
        $contents->update([
            'featured_img' => $request->featured_img,
            'freezone_img' => $request->freezone_img,
            'content_title' => $request->content_title,
            'content_page_title' => $request->content_page_title,
            'content_type' => $request->content_type,
            'meta_description' => $request->meta_description,
            'content_url' => Str::slug($request['content_title']),
            'content_body' => $request->content_body,
            'meta_keywords' => $request->meta_keywords,
            'publish_status' => $request->publish_status??0,
            'show_on_menu' => $request->show_on_menu??'N',
            'meta_title' => $request->meta_title,
            'external_link' => $request->external_link,
            'delete_status' => '0'

        ]);
        $contents->save();
        return redirect()->route('content.index')->with('success', 'Content Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $existing_content = Content::findorFail($id)->update([
        //     'delete_status' => '1'
        // ]);
        Content::findorFail($id)->delete();
        return redirect()->route('content.index')->with('success', 'Content is deleted successfully.');
    }
}
