<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all()->toJson();
        $promotions = Promotion::all()->toJson();
        return view('home',['cupones' => json_decode($coupons),'promociones' => json_decode($promotions)]);
    }
}
