<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;

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

    public function store(Request $request)
    {
        $state = 'Listo';
        $message = 'La promoción fue creada exitosamente.';
        $alert_class = 'alert-success';
        $saving = number_format($request['discount'] / 100 * $request['original_price'], 0, '', '');
        $currentPrice = $request['original_price'] - $saving;
        try{
            Promotion::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'secondary_description' => $request['secondary_description'],
                'image' => $request['image'],
                'web_page' => $request['web_page'],
                'original_price' => $request['original_price'],
                'current_price' => $currentPrice,
                'saving' => $saving,
                'discount' => $request['discount'],
                'address' => $request['address'],
                'status' => 'Activo',
            ]);
        }catch(Exception $exception){
            $state = 'Error';
            $message = 'No pudo crearse la nueva promoción.';
            $alert_class = 'alert-danger';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/promotions');
    }

    public function edit($id)
    {
        $state = 'Listo';
        $message = '';
        $alert_class = 'alert-success';
        $promotion = Promotion::find($id);
        if($promotion){
            try{
                if($promotion->status == 'Activo'){
                    $promotion->status = 'Desactivo';
                    $message = 'La promoción fue desactivada exitosamente.';
                }else{
                    $promotion->status = 'Activo';
                    $message = 'La promoción fue activada exitosamente.';
                }
                $promotion->save();
            }catch(Exception $exception){
                $state = 'Listo';
                $mensaje = 'La promoción no pudo ser editada.';
                $alert_class = 'alert-warning';
            }
        }else{
            $state = 'Error';
            $message = 'La promoción que intentaba editar ya no existe.';
            $alert_class = 'alert-warning';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/promotions');
    }

    public function update(Request $request, $id)
    {
        $state = 'Listo';
        $message = 'La promoción fue editada exitosamente.';
        $alert_class = 'alert-success';
        $promotion = Promotion::find($id);
        if($promotion){
            $saving = number_format($request['discount'] / 100 * $request['original_price'], 0, '', '');
            $currentPrice = $request['original_price'] - $saving;
            try{
                $promotion->title = $request['title'];
                $promotion->description = $request['description'];
                $promotion->secondary_description = $request['secondary_description'];
                $promotion->image = $request['image'];
                $promotion->discount = $request['discount'];
                $promotion->web_page = $request['web_page'];
                $promotion->original_price = $request['original_price'];
                $promotion->current_price = $currentPrice;
                $promotion->saving = $saving;
                $promotion->discount = $request['discount'];
                $promotion->address = $request['address'];
                $promotion->save();
            }catch (Exception $exception){
                $state = 'Error';
                $message = 'No se pudo editar la promoción.';
                $alert_class = 'alert-danger';
            }
        }else{
            $state = 'Error';
            $message = 'La promoción que intentaba editar ya no existe.';
            $alert_class = 'alert-danger';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/promotions');
    }

    public function show($id)
    {
        $promotion = Promotion::find($id);
        return view('admin.promotions.update')->with(['promotion'=>$promotion]);
    }

    public function destroy($id)
    {
        $state = 'Listo';
        $message = 'La promoción fue eliminada exitosamente.';
        $alert_class = 'alert-success';
        $promotion = Promotion::find($id);
        if($promotion){
            $promotion->delete();
        }else{
            $state = 'Error';
            $message = 'La promoción que intentaba borrar ya había sido eliminada.';
            $alert_class = 'alert-danger';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/promotions');
    }
}
