<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollCourse extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','contact','message','course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id')->withDefault();
    }
}
