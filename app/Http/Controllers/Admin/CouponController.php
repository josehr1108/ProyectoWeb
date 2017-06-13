<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::All();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function update($id)
    {
        return view('admin.coupons.update', compact('id'));
    }

    public function destroy($id)
    {
        return view('admin.coupons.destroy', compact('id'));
    }
}
