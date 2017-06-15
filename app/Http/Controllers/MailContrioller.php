<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Coupon;
use Mail;
use App\CouponComment;

class MailContrioller extends Controller
{
    //
    public function basic_email($id){
        $coupon = Coupon::find($id)->toJson();
        $user = Auth::user();
        $userName = $user->name;
        $userEmail = $user->email;
        $couponImage = $coupon->image;
        Mail::send(['text'=>'mail'], ['coupon' => json_decode($coupon)], function ($message) use ($couponImage, $userName, $userEmail) {
            $message->to($userEmail,$userName)->subject('Información del Cupon');
            $message->attach($couponImage);
            $message->from('wikicoupon2014.15@gmail.com','wiki Coupon');
        });
    }

}
