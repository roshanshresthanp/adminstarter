<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'link',
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
}
