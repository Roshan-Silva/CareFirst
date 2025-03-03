<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'top_heading', 
        'bottom_sub_heading', 
        'img_link', 
        'get_appointment_link'
    ];

}
