<?php
/**
 * Created by PhpStorm.
 * User: Equip
 * Date: 8/6/2017
 * Time: 2:25 PM
 */

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

    public function adminIndex()
    {
        $promotions = Promotion::All();
        return view('admin.promotions.index', compact('promotions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Promotion::create($request->all());
            return response()->json(['mensajeRespuesta' => "La promocion fue generada exitosamente."],200);

        }catch (\Exception $exception){
            $exceptionMsg = "Error: {$exception->getMessage()}";
            return response()->json(['mensajeRespuesta' => $exceptionMsg],500);
        }
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
            return response()->json($promotion,200);
        }else{
            return response()->json(['mensajeError' => 'Lo sentimos, la promocion que desea encontrar no existe'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


}
