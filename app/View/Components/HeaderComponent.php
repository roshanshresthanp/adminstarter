<?php

namespace App\View\Components;

use App\Models\Course;
use App\Models\CourseLevel;
use App\Models\Destination;
use App\Models\Learn;
use App\Models\Menu;
use App\Models\Popup;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class HeaderComponent extends Component
{
    public $headerMenu;
    public $footerMenu;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->getHeaders();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $popups = Popup::where('publish_status',1)->latest()->get();
        return view('components.header-component',['popups'=>$popups,'headerMenu'=>$this->headerMenu]);
    }

    private function getHeaders()
    {
        $menus = Menu::where(['parent_id'=> null,'publish_status'=>1])->whereNotIn('header_footer',['2'])
            ->select('id', 'name', 'slug', 'position', 'parent_id', 'header_footer', 'external_link','category_slug','title_slug','content_slug')
            ->with('children:id,name,slug,position,parent_id,header_footer,external_link,category_slug,title_slug,content_slug')
            ->orderBy('position', 'ASC')
            ->get();
        $this->headerMenu = $menus;
    }
}
