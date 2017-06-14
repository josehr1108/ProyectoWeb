<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponComment extends Model
{
    protected $fillable = [
        'user_name',
        'message',
        'couponId',
    ];

    public function coupon(){
        return $this->belongsTo('Coupon');
    }
}
