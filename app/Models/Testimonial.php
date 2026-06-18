<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['client_name', 'company_name', 'feedback', 'rating', 'is_featured'];
    protected $casts = ['is_featured' => 'boolean'];
}