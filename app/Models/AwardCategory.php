<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardCategory extends Model
{
    use HasFactory;
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

    public function awards()
    {
        return $this->hasMany(Award::class,'award_category_id');
    }

    
}