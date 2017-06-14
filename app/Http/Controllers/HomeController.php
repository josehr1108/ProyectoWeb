<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $top5Coupons = DB::table('coupons')
            ->orderBy('visitCount', 'desc')
            ->limit(5)
            ->get()
            ->toJson();
        $top5Promotions = DB::table('promotions')
            ->orderBy('visitCount', 'desc')
            ->limit(5)
            ->get()
            ->toJson();
        return view('home',['cupones' => json_decode($coupons),'promociones' => json_decode($promotions),'top5Coupons' => json_decode($top5Coupons),'top5Promotions' => json_decode($top5Promotions)]);
    }
}
