<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'email',
        'contact_no',
        'province_no',
        'district_no',
        'local_address',
        'company_logo',
        'footer_logo',
        'company_favicon',
        'pan_vat',
        'brief_description',

        'subscribe_sub_title',
        'subscribe_main_title',
        'course_sub_title',
        'course_main_title',
        'news_sub_title',
        'news_main_title',
        'blog_sub_title',
        'blog_main_title',
        'partner_sub_title',
        'partner_main_title',
        'post_no',
        'opening_time',
        'phone',
        'home_bg_img',
        'projects_completed',
        'total_activity',
        'total_nationality',
        'total_employees',
        'total_learner',

        'first_main_title',
        'first_sub_title',
        'second_main_title',
        'second_sub_title',
        'third_main_title',
        'third_sub_title',
        'fourth_main_title',
        'fourth_sub_title',

        'happy_clients',

        'activity_main_title',
        'activity_sub_title',
        'activity_submain_title',
        'nationality_main_title',
        'nationality_sub_title',
        'learner_main_title',
        'learner_sub_title',
        'from_title',
        'anywhere_title',
        'to_title',
        'distance_learning_title',

        'facebook',
        'instagram',
        'whatsapp',
        'youtube',
        'twitter',

        'map_url',
        'aboutus',
        'linkedin',

        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_no', 'id')->withDefault();
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_no', 'id')->withDefault();
    }
}
