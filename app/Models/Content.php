<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public const contentType = [
        'About','Message','Enroll','Why-Choose-Us','Benefit-Advantage','Admission-Form','Inquiry-Form','Pre-Registration-Form'
    ];

    protected $fillable = [
        'content_title',
        'content_page_title',
        'content_url',
        'content_body',
        'featured_img',
        'freezone_img',
        'meta_description',
        'meta_keywords',
        'meta_title',
        'content_type',
        'show_on_menu',
        'external_link',
        'publish_status',
        'delete_status',
    ];

    public function scopeStatus($query)
    {
        return $query->where(['publish_status'=>1,'delete_status'=>0]);

    }
}
