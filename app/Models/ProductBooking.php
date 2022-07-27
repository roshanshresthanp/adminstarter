<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_type',
        'product_title',
        'product_price',
        'name',
        'email',
        'contact_no',
        'message',
        'is_read',
        'address'
    ];
}
