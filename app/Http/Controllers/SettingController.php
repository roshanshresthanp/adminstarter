<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\District;
use App\Models\MissionMessages;
use App\Models\Province;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        $provinces = Province::all();
        $districts = District::where('province_id', $setting->province_no)->get();
        return view('backend.setting.company_setting', compact('provinces', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    public function socialMedia()
    {
        // $setting = Setting::first();
        return view('backend.setting.socialmedia');
    }

    public function aboutUs()
    {
        // $setting = Setting::first();
        $mission = MissionMessages::first();
        return view('backend.setting.aboutus', compact('mission'));
    }

    public function updateMissionVision(Request $request, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $setting = Setting::first();
        // $mission_messages = MissionMessages::first();
        if(isset($_POST['companySetting']))
        {
            $setting->update([
                'company_name' => $request['company_name'],
                'email' => $request['email'],
                'contact_no' => $request['contact_no'],
                'phone' => $request['phone'],
                'post_no' => $request['post_no'],
                'pan_vat' => $request['pan_vat'],
                'province_no' => $request['province'],
                'district_no' => $request['district'],
                'local_address' => $request['local_address'],
                'company_logo' => $request->company_logo,
                'footer_logo' => $request->footer_logo,
                'company_favicon' => $request->company_favicon,
                'map_url' => $request['map_url'],
                'brief_description' => $request['brief_description'],

                'opening_time'=>$request->opening_time

            ]);
            return redirect()->back()->with('success', 'Company information successfully updated.');
        }
        elseif (isset($_POST['metaSetting']))
        {
            $setting->update([
                'meta_title' => $request['meta_title'],
                'meta_keywords' => $request['meta_keywords'],
                'meta_description' => $request['meta_description'],
                'og_image' => $request->og_image,
            ]);
            return redirect()->back()->with('success', 'Meta information successfully updated.');

        }
        elseif (isset($_POST['socialMedia']))
        {
            $setting->update([
                'facebook' => $request['facebook'],
                'instagram' => $request['instagram'],
                'whatsapp' => $request['whatsapp'],
                'youtube' => $request['youtube'],
                'twitter' => $request['twitter'],
                'linkedin' => $request['linkedin']
            ]);
            return redirect()->back()->with('success', 'Social media information successfully updated.');

        }

        elseif (isset($_POST['home']))
        {
            // return $request->all();
            $setting->update([
                'subscribe_sub_title'=>$request->subscribe_sub_title,
                'subscribe_main_title'=>$request->subscribe_main_title,
                'course_sub_title'=>$request->course_sub_title,
                'course_main_title'=>$request->course_main_title,
                'news_sub_title'=>$request->news_sub_title,
                'news_main_title'=>$request->news_main_title,
                'blog_sub_title'=>$request->blog_sub_title,
                'blog_main_title'=>$request->blog_main_title,
                'partner_sub_title'=>$request->partner_sub_title,
                'partner_main_title'=>$request->partner_main_title,
                'home_bg_img'=>$request->home_bg_img,
                'first_main_title'=>$request->first_main_title,
                'first_sub_title'=>$request->first_sub_title,
                'second_main_title'=>$request->second_main_title,
                'second_sub_title'=>$request->second_sub_title,
                'third_main_title'=>$request->third_main_title,
                'third_sub_title'=>$request->third_sub_title,
                'fourth_main_title'=>$request->fourth_main_title,
                'fourth_sub_title'=>$request->fourth_sub_title,
                'total_activity'=>$request['total_activity'],
                'total_learner'=>$request['total_learner'],
                'total_nationality'=>$request->total_nationality,

                'activity_main_title'=>$request->activity_main_title,
                'activity_sub_title'=>$request->activity_sub_title,
                'activity_submain_title'=>$request->activity_submain_title,
                'nationality_main_title'=>$request->nationality_main_title,
                'nationality_sub_title'=>$request->nationality_sub_title,
                'learner_main_title'=>$request->learner_main_title,
                'learner_sub_title'=>$request->learner_sub_title,
                'from_title'=>$request->from_title,
                'anywhere_title'=>$request->anywhere_title,
                'to_title'=>$request->to_title,
                'distance_learning_title'=>$request->distance_learning_title,
            ]);

            return redirect()->back()->with('success', 'Home information successfully updated.');

            // $mission_messages->update([
            //     'mission' => $request['mission'],
            //     'vision' => $request['vision'],
            //     'company_values' => $request['company_values'],
            //     'welcome_title' => $request['welcome_title'],
            //     'welcome_sub_title' => $request['welcome_sub_title'],
            //     'welcome_message' => $request['welcome_message'],
            //     'youtube_link' => $request['youtube_link'],
            // ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function getdistricts($id)
    {
        $districts = District::where('province_id', $id)->get();
        return response()->json($districts);
    }
}
