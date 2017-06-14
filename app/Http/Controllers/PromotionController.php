<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::All()->toArray();
        return response()->json($promotions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);
        if($promotion){
            return response()->json($promotion, 200);
        }else{
            return response()->json(['mensajeError' => 'Lo sentimos, la promocion que desea encontrar no existe'], 404);
        }
    }
}
