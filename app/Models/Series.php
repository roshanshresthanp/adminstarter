<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'model_name',
        'slug',
        'model_image',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
