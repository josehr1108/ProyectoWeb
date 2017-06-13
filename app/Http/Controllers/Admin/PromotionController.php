<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function index()
    {
        $promotions = Promotion::All();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function update($id)
    {
        return view('admin.promotions.update', compact('id'));
    }

    public function destroy($id)
    {
        return view('admin.promotions.destroy', compact('id'));
    }
}
