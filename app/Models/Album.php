<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_cover',
        'title_slug',   
        'album_title',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image',
        'publish_status',
        'banner_image'
    ];

    public function image(){
        return $this->hasMany(AlbumImages::class,'album_id');
    }
    
}
