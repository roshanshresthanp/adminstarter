<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['cover_image', 'banner_image', 'title', 'slug', 'descriptive_title', 'content', 'written_on', 'author', 'view_count', 'news_blogs', 'meta_title', 'meta_keywords', 'meta_description', 'og_image'];

    public function incrementReadCount() {
        $this->view_count++;
        return $this->save();
    }
}
