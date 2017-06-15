<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\CouponComment;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::All()->toArray();
        return response()->json($coupons);
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
            Coupon::create($request->all());
            return response()->json(['mensajeRespuesta' => "El cupon fue generado exitosamente."], 200);
        }catch (\Exception $exception){
            $exceptionMsg = "Error: {$exception->getMessage()}";
            return response()->json(['mensajeRespuesta' => $exceptionMsg], 500);
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
        $coupon = Coupon::find($id);
        if($coupon){
            return response()->json($coupon, 200);
        }else{
            return response()->json(['mensajeError' => 'Lo sentimos, el cupon que desea encontrar no existe'], 404);
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
        $coupon = Coupon::find($id);
        if($coupon){
            try{
                $coupon->information = $request->information;
                $coupon->image = $request->image;
                $coupon->expiration_date = $request->expiration_date;
                $coupon->type = $request->type;
                $coupon->discount = $request->discount;
                $coupon->original_price = $request->original_price;
                $coupon->current_price = $request->current_price;
                $coupon->city = $request->city;
                $coupon->address = $request->address;
                $coupon->schedule = $request->schedule;
                $coupon->use_interval = $request->use_interval;

                $coupon->save();

                return response()->json(['mensajeExistoso' => 'El cupon fue actualizado adecuadamente por el sistema.'], 200);
            }catch (Exception $exception){
                $mensaje = $exception->getMessage();
                return response()->json(['mensajeExistoso' => $mensaje], 500);
            }
        }else{
            return response()->json(['mensajeError' => 'El cupon que desea actualizar no se ha podido crear.'], 404);
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
        $coupon = Coupon::find($id);
        if($coupon){
            $coupon->delete();
            return response()->json(['mensaje' => 'El cupon ha sido eliminado exitosamente.'], 404);
        }else{
            return response()->json(['mensaje' => 'Lo sentimos, el cupon no ha podido ser eliminado.'], 404);
        }
    }

    public function couponView($id){
        $coupon = Coupon::find($id)->toJson();
        $comments = CouponComment::where('couponId',$id)->get()->toJson();
        return view('admin.coupons.couponView',['coupon' => json_decode($coupon)],['comments' => json_decode($comments)]);
    }
}
