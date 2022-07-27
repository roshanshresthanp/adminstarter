<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover_image',
        'title',
        'slug',
        'description',
        'banner_image',
        'award_category_id',
        'publish_status',   
        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image',
    ];
    
    public function category()
    {
        return $this->belongsTo(AwardCategory::class,'award_category_id')->withDefault();
    }
}
