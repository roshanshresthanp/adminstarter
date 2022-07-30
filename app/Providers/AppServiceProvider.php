<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\CourseCategory;
use App\Models\Extra;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Menu;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $setting = Setting::first();
        View::share('setting', $setting);

        View::share('footerMenu' , Menu::where(['parent_id'=> null,'publish_status'=>1])->whereNotIn('header_footer',['1'])
        ->select('id', 'name', 'slug', 'position', 'parent_id','external_link','category_slug','title_slug','content_slug')
        ->orderBy('position', 'ASC')
        ->take(5)
        ->get());

        // view()->share('admissionform',Content::status()->where('content_type','Admission-Form')->first());
        // view()->share('inquiryform',Content::status()->where('content_type','Inquiry-Form')->first());
        // view()->share('registrationform',Content::status()->where('content_type','Pre-Registration-Form')->first());



        // View::share('headerMenu', Menu::where(['parent_id'=> null,'publish_status'=>1])->whereNotIn('header_footer',['2'])
        //     ->select('id', 'name', 'slug', 'position', 'parent_id', 'header_footer', 'external_link','category_slug','page_title')
        //     ->with('children:id,name,slug,position,parent_id,header_footer,external_link,category_slug,page_title')
        //     ->orderBy('position', 'ASC')
        //     ->get());

        // View::composer('backend/includes/header', function ($view) {
        //     $view->with('unread_messages' , \App\Models\MailMessages::where('is_read', 0)->get());
        //     $view->with('unread_subscribers ', \App\Models\Subscribers::where('is_read', 0)->get());
        // });
    }
}
