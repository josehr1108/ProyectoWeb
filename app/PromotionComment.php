<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionComment extends Model
{
    protected $fillable = [
        'user_name',
        'message',
        'promotionId',
    ];

    public function coupon(){
        return $this->belongsTo('Promotion');
    }
}
