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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $promotion = Promotion::find($id);
        if($promotion){
            try{
                $promotion->title = $request->title;
                $promotion->description = $request->description;
                $promotion->secondary_description = $request->secondary_description;
                $promotion->image = $request->image;
                $promotion->discount = $request->discount;
                $promotion->web_page = $request->web_page;
                $promotion->original_price = $request->original_price;
                $promotion->current_price = $request->current_price;
                $promotion->saving = $request->saving;
                $promotion->discount = $request->discount;
                $promotion->address = $request->address;

                $promotion->save();

                return response()->json(['mensajeExistoso' => 'La promocion fue actualizada adecuadamente por el sistema.'],200);
            }catch (Exception $exception){
                $mensaje = $exception->getMessage();
                return response()->json(['mensajeExistoso' => $mensaje],500);
            }
        }else{
            return response()->json(['mensajeError' => 'La promacion que desea actualizar no se ha podido crear.'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        if($promotion){
            $promotion->delete();
            return response()->json(['mensaje' => 'La promocion ha sido eliminada exitosamente.'],404);
        }else{
            return response()->json(['mensaje' => 'Lo sentimos, la promocion no ha podido ser eliminada.'],404);
        }
    }

    public function promotionView($id){
        $promocion = Promotion::find($id)->toJson();
        return view('admin.promotions.promotionView',['promocion' => json_decode($promocion)]);
    }
}