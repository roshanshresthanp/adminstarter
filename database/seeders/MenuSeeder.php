<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuCategory::insert([
            [

                'name' => 'Home',
                'slug' => Str::slug('Home')
            ],
            [
                'name' => 'About',
                'slug' => Str::slug('About')
            ],
            [
                'name' => 'Page',
                'slug' => Str::slug('Page')
            ],
            [
                'name' => 'Gallery',
                'slug' => Str::slug('Gallery')
            ],
            [
                'name' => 'Contact',
                'slug' => Str::slug('Contact')
            ],
            [
                'name' => 'Blogs',
                'slug' => Str::slug('Blogs')
            ],
            [
                'name' => 'Course',
                'slug' => Str::slug('Course')
            ],
            // [
            //     'name' => 'Team',
            //     'slug' => Str::slug('Team')
            // ],
            // [
            //     'name' => 'All Course',
            //     'slug' => Str::slug('All Course')
            // ],


        ]);

        Menu::insert([
            [
                'name' => 'Home',
                'page_title'=>'Home',
                'slug' => 'home',
                'publish_status'=>1,
                'header_footer'=>1,
                'category_slug'=>'home',
                'main_child'=>0,
                'position'=>0
            ],
            [
                'name' => 'About',
                'page_title'=>'About',
                'slug' => Str::slug('About'),
                // 'external_link'=>'#about_wrapper',
                'publish_status'=>1,
                'header_footer'=>1,
                'category_slug'=>'about',
                'main_child'=>0,
                'position'=>0

            ],
            [
                'name' => 'Blog',
                'page_title'=>'Blog',
                'slug' => Str::slug('Blog'),
                // 'external_link'=>'#blog_wrapper',
                'publish_status'=>1,
                'header_footer'=>1,
                'category_slug'=>'blogs',
                'main_child'=>0,
                'position'=>0

            ],
            [
            'name' => 'Gallery',
            'page_title'=>'Gallery',
            'slug' => Str::slug('Gallery'),
            // 'external_link'=>'#gallery_wrapper',
            'publish_status'=>1,
            'header_footer'=>1,
            'category_slug'=>'gallery',
            'main_child'=>0,
            'position'=>0
            ],
            // [
            //     'name' => 'Service',
            //     'page_title'=>'service',
            //     'slug' => Str::slug('service'),
            //     // 'external_link'=>'#services_wrapper',
            //     'publish_status'=>1,
            //     'header_footer'=>1,
            //     'category_slug'=>'about',
            //     'main_child'=>0,
            //     'position'=>0
            // ],
            // [
            //     'name' => 'Testimonial',
            //     'page_title'=>'Testimonial',
            //     'slug' => Str::slug('Testimonial'),
            //     // 'external_link'=>'#testimonial_wrapper',
            //     'publish_status'=>1,
            //     'header_footer'=>1,
            //     'category_slug'=>'about',
            //     'main_child'=>0,
            //     'position'=>0
            // ],
            [
            'name' => 'Contact',
            'page_title'=>'Contact',
            'slug' => 'contact',
            // 'external_link'=>'#contact_wrapper',
            'publish_status'=>1,
            'header_footer'=>1,
            'category_slug'=>'contact',
            'main_child'=>0,
            'position'=>0
            ]

        ]);
    }
}
