<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_image',
        'title',
        'slug',
        'content',
        'icon',
        'banner_image',
        'service_type_id',
        'publish_status',   
        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image',
    ];

    public function type(){
        return $this->belongsTo(ServiceType::class,'service_type_id');
    }
}
