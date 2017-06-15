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
        $comments = CouponComment::where('couponId',$id)->get()->toJson();
        $user = Auth::user();
        $userName = $user->name;
        $userEmail = $user->email;
        Mail::send(['text'=>'admin.coupons.couponView'], ['coupon' => json_decode($coupon),'comments' => json_decode($comments)], function ($message) use ($userName, $userEmail) {
            $message->to($userEmail,$userName)->subject('Información del Cupon');
            $message->from('wikicoupon2014.15@gmail.com','wiki Coupon');
        });
    }

}
