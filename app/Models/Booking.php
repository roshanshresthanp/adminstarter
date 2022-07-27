<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_type',
        'plan_title',
        'plan_price',
        'name',
        'email',
        'contact_no',
        'message',
        'is_read',
        'address'
    ];
}
