<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'slug',
        'description',
        'publish_status',
        // 'banner_image',

    ];
}
