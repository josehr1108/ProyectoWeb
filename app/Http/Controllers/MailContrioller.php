<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;
use Auth;
use App\Coupon;
use Mail;

class MailContrioller extends Controller
{
    //
    public function basic_email($id){
        $coupon = Coupon::find($id)->toJson();
        $user = Auth::user();
        dd($coupon);
        $userName = $user->name;
        $userEmail = $user->email;
        Mail::send(['text'=>'mail'], ['coupon' => json_decode($coupon)], function ($message) use ($userName, $userEmail) {
            $message->to($userEmail,$userName)->subject('Información del Cupon');
            $message->from('wikicoupon2014.15@gmail.com','wiki Coupon');
        });
    }

    public function basic_emailPro($id){
        $promocion = Promotion::find($id)->toJson();
        $user = Auth::user();
        $userName = $user->name;
        $userEmail = $user->email;
        Mail::send(['text'=>'mailPro'], ['promocion' => json_decode($promocion)], function ($message) use ($userName, $userEmail) {
            $message->to($userEmail,$userName)->subject('Información del Cupon');
            $message->from('wikicoupon2014.15@gmail.com','wiki Coupon');
        });
    }

}
