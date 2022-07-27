<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'image',
        'current_grade',
        'applied_stream',
        'gender',
        'nationality',
        'email',
        'dob_bs',
        'dob_ad',
        'age',
        'address',
        'type',
        'student_contact',
        'father_name',
        'father_contact',
        'father_email',
        'father_occupation',
        'mother_name',
        'mother_contact',
        'mother_email',
        'mother_occupation',
        'local_name',
        'local_contact',
        'local_email',
        'local_occupation',
        'previous_school',
        'previous_address',
        'previous_gpa',
        'message',
        'employment_status',
        'marital_status',
        'passed_year',
        'passed_division',
    ];
}
