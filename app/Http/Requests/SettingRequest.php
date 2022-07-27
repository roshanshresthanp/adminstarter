<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'nullable|max:250',
            'email' => 'nullable|max:250|email',
            'contact_no' => 'nullable|max:250',
            'pan_vat' => 'nullable|max:250',
            'province' => 'nullable|max:250',
            'district' => 'nullable|max:250',
            'local_address' => 'nullable|max:250',
            'company_logo' => 'nullable|max:250',
            'footer_logo' => 'nullable|max:250',
            'company_favicon' => 'nullable|max:250',
            // 'projects_completed'    => 'nullable',
            // 'total_employees'    => 'nullable',
            // 'happy_clients'    => 'nullable',
            'map_url' => 'nullable',
            'brief_description'=>'nullable|max:1500',
            'meta_title' => 'nullable|max:250',
            'meta_keywords' => 'nullable|max:250',
            'meta_description' => 'nullable|max:600',
            'og_image' => 'nullable|max:250',
            'facebook' => 'nullable|max:250',
            'instagram' => 'nullable|max:250',
            'whatsapp' => 'nullable|max:250',
            'youtube' => 'nullable|max:250',
            'twitter' => 'nullable|max:250',
            'linkedin' =>'nullable|max:250',
            'subscribe_sub_title'=>'nullable|max:250',
            'subscribe_main_title'=>'nullable|max:250',
            'course_sub_title'=>'nullable|max:250',
            'course_main_title'=>'nullable|max:250',
            'news_sub_title'=>'nullable|max:250',
            'news_main_title'=>'nullable|max:250',
            'blog_sub_title'=>'nullable|max:250',
            'blog_main_title'=>'nullable|max:250',
            'partner_sub_title'=>'nullable|max:250',
            'partner_main_title'=>'nullable|max:250',
            'phone' => 'nullable|max:250',
            'post_no' =>  'nullable|max:250',
            'home_bg_img'=>'nullable|max:250',
            'first_main_title'=>'nullable|max:250',
            'first_sub_title'=>'nullable|max:250',
            'second_main_title'=>'nullable|max:250',
            'second_sub_title'=>'nullable|max:250',
            'third_main_title'=>'nullable|max:250',
            'third_sub_title'=>'nullable|max:250',
            'fourth_main_title'=>'nullable|max:250',
            'fourth_sub_title'=>'nullable|max:250',
            'opening_time'=>'nullable|max:250',
            'linkedin'=>'nullable|max:250',

            'activity_main_title'=>'nullable|max:250',
            'activity_sub_title'=>'nullable|max:250',
            'activity_submain_title'=>'nullable|max:250',
            'nationality_main_title'=>'nullable|max:250',
            'nationality_sub_title'=>'nullable|max:250',
            'learner_main_title'=>'nullable|max:250',
            'learner_sub_title'=>'nullable|max:250',

            'from_title'=>'nullable|max:250',
            'anywhere_title'=>'nullable|max:250',
            'to_title'=>'nullable|max:250',
            'distance_learning_title'=>'nullable|max:250',

        ];
    }
}
