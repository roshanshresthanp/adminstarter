<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_image',
        'title',
        'slug',
        'description',
        'banner_image',
        'semester',
        'duration',
        'course_category',
        'publish_status',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image',
        'show_on_menu'
    ];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class,'course_category')->withDefault();
    }
    public function scopeStatus($query)
    {
        return $query->where('publish_status',1);
    }
    public function scopeForMenu($query)
    {
        return $query->status()->whereNotIn('show_on_menu',['0']);
    }



    // public function getCategory()
    // {
    //     return $this->belongsTo(CourseCategory::class, 'course_category');
    // }
    // public function getDestination()
    // {
    //     return $this->belongsTo(Destination::class, 'destination');
    // }

    // public function getlevel()
    // {
    //     return $this->belongsTo(CourseLevel::class, 'course_level');
    // }
}
