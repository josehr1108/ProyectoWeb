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
        $coupon = Coupon::find($id);
        $user = Auth::user();
        dd($coupon);
        $userName = $user->name;
        $userEmail = $user->email;
        Mail::send(['text'=>'mail'], $coupon, function ($message) use ($userName, $userEmail) {
            $message->to($userEmail,$userName)->subject('Información del Cupon');
            $message->from('wikicoupon2014.15@gmail.com','wiki Coupon');
        });
    }

}
