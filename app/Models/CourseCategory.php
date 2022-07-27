<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $table = 'course_category';
    protected $fillable = [
        'image',
        'title',
        'slug',
        'description',
        'publish_status',
        'banner_image',
        'meta_title',
        'meta_keywords',

        'meta_description',
        'og_image',
    ];
    public function course()
    {
        return $this->hasMany(Course::class,'course_category')->where('publish_status',1);
    }
    public function scopeStatus($query)
    {
        return $query->where('publish_status',1);
    }
}
