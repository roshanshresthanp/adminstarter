<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['team_type_id','name', 'slug', 'post', 'image', 'address', 'phone', 'email', 'website', 'content', 'facebook', 'linkedin', 'youtube', 'twitter', 'status', 'in_order'];

    public function team()
    {
        return $this->belongsTo(TeamType::class,'team_type_id')->withDefault();
    }

    public function scopeStatus($query)
    {
        return $query->where('status',1)->orderBy('in_order');
    }
}
