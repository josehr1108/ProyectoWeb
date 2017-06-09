<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'title',
        'description',
        'secondary_description',
        'image',
        'web_page',
        'original_price',
        'current_price',
        'saving',
        'discount',
        'address',
        'status',
    ];
}
