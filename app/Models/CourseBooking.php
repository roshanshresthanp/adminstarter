<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'course_title',
        'course_price',
        'name',
        'email',
        'contact_no',
        // 'message',
        'is_read',
        'address'
    ];
}
