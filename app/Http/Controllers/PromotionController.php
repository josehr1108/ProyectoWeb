<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

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

    public function edit($id)
    {
        return view('admin.promotions.edit');
    }

    public function destroy($id)
    {
        //
    }

    public function updateState($id, $state){

    }
}
