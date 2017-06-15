<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;

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

    public function store(Request $request)
    {
        $state = 'Listo';
        $message = 'El cupón fue creado exitosamente.';
        $alert_class = 'alert-success';
        $currentPrice = $request['original_price'] - number_format($request['discount'] / 100 * $request['original_price'], 0, '', '');
        try{
            Coupon::create([
                'information' => $request['information'],
                'image' => $request['image'],
                'expiration_date' => $request['expiration_date'],
                'image' => $request['image'],
                'type' => $request['type'],
                'discount' => $request['discount'],
                'original_price' => $request['original_price'],
                'current_price' => $currentPrice,
                'city' => $request['city'],
                'address' => $request['address'],
                'schedule' => $request['schedule'],
                'use_interval' => $request['use_interval'],
                'status' => 'activo',
            ]);
        }catch(Exception $exception){
            $state = 'Error';
            $message = 'No pudo crearse el nuevo cupón.';
            $alert_class = 'alert-danger';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/coupons');
    }

    public function edit($id)
    {
        $state = 'Listo';
        $message = '';
        $alert_class = 'alert-success';
        $coupon = Coupon::find($id);
        if($coupon){
            try{
                if($coupon->status == 'activo'){
                    $coupon->status = 'inactivo';
                    $message = 'El cupón fue desactivado exitosamente.';
                }else{
                    $coupon->status = 'activo';
                    $message = 'El cupón fue activado exitosamente.';
                }
                $coupon->save();
            }catch(Exception $exception){
                $state = 'Listo';
                $mensaje = 'El cupón no pudo ser editado.';
                $alert_class = 'alert-warning';
            }
        }else{
            $state = 'Error';
            $message = 'El cupón que intentaba editar ya no existe.';
            $alert_class = 'alert-warning';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/coupons');
    }

    public function update(Request $request, $id)
    {
        $state = 'Listo';
        $message = 'El cupón fue editado exitosamente.';
        $alert_class = 'alert-success';
        $coupon = Coupon::find($id);
        if($coupon){
            $currentPrice = $request['original_price'] - number_format($request['discount'] / 100 * $request['original_price'], 0, '', '');
            try{
                $coupon->information = $request['information'];
                $coupon->image = $request['image'];
                $coupon->expiration_date = $request['expiration_date'];
                $coupon->type = $request['type'];
                $coupon->discount = $request['discount'];
                $coupon->original_price = $request['original_price'];
                $coupon->current_price = $currentPrice;
                $coupon->city = $request['city'];
                $coupon->address = $request['address'];
                $coupon->schedule = $request['schedule'];
                $coupon->use_interval = $request['use_interval'];
                $coupon->save();
            }catch (Exception $exception){
                $state = 'Error';
                $message = 'No se pudo editar el cupón.';
                $alert_class = 'alert-danger';
            }
        }else{
            $state = 'Error';
            $message = 'El cupón que intentaba editar ya no existe.';
            $alert_class = 'alert-danger';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/coupons');
    }

    public function show($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.update', compact('coupon'));
    }

    public function destroy($id)
    {
        $state = 'Listo';
        $message = 'El cupón fue eliminado exitosamente.';
        $alert_class = 'alert-success';
        $coupon = Coupon::find($id);
        if($coupon){
            $coupon->delete();
        }else{
            $state = 'Error';
            $message = 'El cupón que intentaba borrar ya había sido eliminada.';
            $alert_class = 'alert-danger';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/coupons');
    }
}
