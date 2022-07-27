<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::latest()->paginate(10);
        return view('backend.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.album.create');
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
            'album_cover' => 'nullable|string|max:250',
            'album_title'    => 'required',
            'album_images' => 'required|string',
            'meta_title'  => 'nullable|string|max:250',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'publish_status'=>'nullable',
            'banner_image'=>'nullable|max:250'
        ]);
        $images = explode(',',$request->album_images);
        $input = $request->all();
        $input['title_slug'] = str_slug($request->album_title);
        $input['publish_status'] = $request->publish_status??0;
        $new_album = Album::create($input);
            foreach($images as $image)
            {  
                $img = AlbumImages::create([
                    'album_id' => $new_album->id,
                    'album_images' => $image,
                ]);
                $img->save();
            }
        return redirect()->route('album.index')->with('success', 'Album is created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findorFail($id);
        $album_images = AlbumImages::where('album_id', $id)->get();

        return view('backend.album.create', compact('album', 'album_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'album_cover' => 'nullable|string|max:250',
            'album_title'    => 'required',
            'album_images' => 'nullable',
            'meta_title'  => 'nullable|string|max:250',
            'meta_keywords'  => 'nullable',
            'meta_description'  => 'nullable',
            'og_image' => 'nullable|string|max:250',
            'banner_image'=>'nullable|max:250'

        ]);
        // return $request->all();
            $input = $request->all();
            $input['publish_status'] = $request->publish_status??0;
            $input['title_slug'] = str_slug($request->album_title);
            $album = Album::findorFail($id);
            $album->update($input);
            if(!is_null($request->album_images))
            {
                $album->image()->delete();
                $images = explode(',',$request->album_images);
                foreach($images as $image)
                {  
                    $img = AlbumImages::create([
                        'album_id' => $album->id,
                        'album_images' => $image,
                    ]);
                    $img->save();
                }
            }
                

        // if (isset($_POST['updateAlbum']))
        // {
        //     $this->validate($request, [
        //         'album_title'    => 'required',
        //         'album_cover' => 'required|mimes:png,jpg,jpeg',
        //         'meta_title'  => '',
        //         'meta_keywords'  => '',
        //         'meta_description'  => '',
        //         'og_image' => 'mimes:png,jpg,jpeg',
        //     ]);
        //     $input = $request->all();
            

        //     if($request->hasfile('album_cover'))
        //     {
        //         Storage::disk('uploads')->delete($album->album_cover);
        //         $image = $request->file('album_cover');
        //         $album_cover = $image->store('album_covers', 'uploads');
        //     }
        //     else
        //     {
        //         $album_cover = $album->album_cover;
        //     }

        //     $og_image = '';
        //     if($request->hasfile('og_image'))
        //     {
        //         $image = $request->file('og_image');
        //         $og_image = $image->store('og_image', 'uploads');
        //     }
        //     else
        //     {
        //         $og_image = $album->og_image;
        //     }

        //     $album->update([
        //         'album_title' => $request['album_title'],
        //         'title_slug' => Str::slug($request->album_title),
        //         'album_cover' => $album_cover,
        //         'meta_title' => $request['meta_title'],
        //         'meta_keywords' => $request['meta_keywords'],
        //         'meta_description' => $request['meta_description'],
        //         'og_image' => $og_image,
        //     ]);

        //     return redirect()->route('album.index')->with('success', 'Album is updated successfully.');
        // }
        // elseif(isset($_POST['updateImages']))
        // {
        //     $this->validate($request, [
        //         'album_images' => '',
        //         'album_images.*' => 'mimes:jpeg,jpg,png'
        //     ]);

        //     $imagename = '';
        //     if($request->hasfile('album_images'))
        //     {
        //         $images = $request->file('album_images');
        //         foreach($images as $image)
        //         {
        //             $imagename = $image->store('album_images', 'uploads');
        //             $album_images = AlbumImages::create([
        //                 'album_id' => $album->id,
        //                 'album_images' => $imagename,
        //             ]);
        //             $album_images->save();
        //         }
        //     }

        //     return redirect()->back()->with('success', 'Album Images is added successfully.');
        // }
        return redirect()->back()->with('success', 'Album Images is updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findorFail($id);
        $album_images = AlbumImages::where('album_id', $album->id)->get();
        foreach ($album_images as $images) {
            Storage::disk('uploads')->delete($images->album_images);
            $images->delete();
        }

        Storage::disk('uploads')->delete($album->album_cover);
        $album->delete();

        return redirect()->route('album.index')->with('success', 'Album Deleted Successfully');

    }

    public function deleteAlbumImage($id)
    {
        $album_image = AlbumImages::findorfail($id);
        $images = AlbumImages::where('album_id', $album_image->album_id)->get();
        // if(count($images) < 2)
        // {
        //     return redirect()->back()->with('error', 'Only one image cannot be deleted.');
        // }

        Storage::disk('uploads')->delete($album_image->album_images);

        $album_image->delete();
        return redirect()->back()->with('success', 'Album Image Deleted Successfully');
    }
}
