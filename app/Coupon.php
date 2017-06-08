<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'information',
        'image',
        'expiration_date',
        'type',
        'discount',
        'original_price',
        'current_price',
        'city',
        'address',
        'schedule',
        'use_interval',
        'status',
    ];
}
