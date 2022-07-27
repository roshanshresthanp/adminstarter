<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\Nullable;

class MenuController extends Controller
{
    protected $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_items = Menu::orderBy('position', 'asc')->whereIn('header_footer', ['1','3'])->get();
        $menu_footer = Menu::orderBy('position', 'asc')->whereIn('header_footer', ['2','3'])->get();
        return view('backend.menu.index', compact('menu_items', 'menu_footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_categories = MenuCategory::latest()->get();
        // dd($menu_categories);
        $parent_menus = Menu::where('parent_id', null)->get();
        return view('backend.menu.create', compact('menu_categories', 'parent_menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'menu_category' => 'required',
            'page_title'=>'required',
            'main_child' => 'required',
            'parent_id' => '',
            'show_in' => '',
            'image'=>'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'meta_title'  => '',
            'meta_keywords'  => '',
            'meta_description'  => '',
            'og_image' => 'nullable|string|max:250',
            'title_slug'=>'nullable',
            'content_slug'=>'nullable'

        ]);
        // return $request->all();
        $parent_id = NULL;
        $show_in = 1;
        if($request['main_child'] == 1)
        {
            $parent_id = $request['parent_id'];
        }
        else if($request['main_child'] == 0)
        {
            $show_in = $request['show_in'];
        }
        $menu_count = Menu::all()->count();
        $new_menu = Menu::create([
            'name' => $request['name'],
            'slug' => Str::slug($request->name),
            'position' => $menu_count + 1,
            'category_slug' => $request['menu_category'],
            'main_child' => $request['main_child'],
            'parent_id' => $parent_id,
            'external_link' => $request['external_link'],
            'header_footer' => $show_in,
            'banner_image' => $request->banner_image,
            'image' => $request->image,
            'publish_status'=>$request->publish_status ?? 0,
            'page_title' => $request['page_title'],
            'title_slug' => Str::slug($request->page_title),
            'content_slug' => $request['content_slug'],
            'content' => $request['content'],
            'meta_title' => $request['meta_title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'og_image' => $request->og_image,

        ]);
        $new_menu->save();
        return redirect()->route('menu.index')->with('success', 'Menu information is saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findorFail($id);
        $menu_categories = MenuCategory::latest()->get();
        $parent_menus = Menu::where('parent_id', null)->get();
        return view('backend.menu.edit', compact('menu', 'menu_categories', 'parent_menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'    => 'required',
            'menu_category' => 'required',
            'main_child' => 'required',
            'parent_id' => '',
            'show_in' => '',
            'image'=>'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'meta_title'  => '',
            'meta_keywords'  => '',
            'meta_description'  => '',
            'og_image' => 'nullable|string|max:250',
            'content_slug'=>'nullable'
        ]);
        $menu = Menu::findorFail($id);
        $parent_id = NULL;
        $show_in = 1;
        if($request['main_child'] == 1)
        {
            $parent_id = $request['parent_id'];
        }
        else if($request['main_child'] == 0)
        {
            $show_in = $request['show_in'];
        }

        $menu->update([
            'name' => $request['name'],
            'slug' => Str::slug($request->name),
            'category_slug' => $request['menu_category'],
            'main_child' => $request['main_child'],
            'parent_id' => $parent_id,
            'external_link' => $request['external_link'],
            'header_footer' => $show_in,
            'banner_image' => $request->banner_image,
            'image' => $request->image,
            'page_title' => $request['page_title'],
            'title_slug' => Str::slug($request->page_title),
            'content_slug' => $request['content_slug'],
            'content' => $request['content'],
            'meta_title' => $request['meta_title'],
            'publish_status'=>$request->publish_status ?? 0,
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'og_image' => $request->og_image,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu information is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $menu = Menu::findorFail($id);
        $child_menus = Menu::where('parent_id', $menu->id)->get();
        if(count($child_menus) > 0)
        {
            return redirect()->back()->with('error', 'This menu contains child menus.');
        }else{
            Storage::disk('uploads')->delete($menu->banner_image);
            $menu->delete();
            return redirect()->route('menu.index')->with('success', 'Menu information is deleted successfully.');
        }
    }

    public function menuLinkCourse(Request $request)
    {
        $result = null;
        if($request->name =='message')
        {
            $messages = Content::where(['content_type'=>'Message','delete_status'=>0])->select('id','content_title','content_url')->get();
            foreach($messages as $message)
            {
                $result .= "<option value='$message->content_url'>$message->content_title</option>";
            }
        return response()->json($result);
        }

        if($request->name =='course')
        {
            $courses = Course::forMenu()->select('id','slug','title')->get();
            foreach($courses as $course)
            {
                $result .= "<option value='$course->slug'>$course->title</option>";
            }
            return response()->json($result);
        }


    }

    public function updateMenuOrder(Request $request)
    {
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['menuItem'])) {
            foreach ($arr['menuItem'] as $key => $value) {  //id //parent_id
                $this->menu->where('id', $key)
                    ->update([
                        'position' => $order,
                        'parent_id' => ($value == "null") ? NULL : $value,
                        'main_child' => ($value == "null") ? 0 : 1,
                    ]);
                $order++;
            }
        }
        return true;
    }

    private function update_child($id)
    {
        $menus = Menu::where('parent_id', $id)->get();
        if ($menus->count() > 1) {
            foreach ($menus as $child) {
                Menu::where('id', $child->id)->update(['parent_id' => $child->id]);
                $this->update_child($child->id);
            }
            // $this->forgetMenuCache();
        }
    }

    public function create_menuCategory(Request $request)
    {
        $menuCategory = MenuCategory::create([
            'name' => $request['name'],
            'slug' => Str::slug($request->name),
        ]);
        $menuCategory->save();
    }
}
