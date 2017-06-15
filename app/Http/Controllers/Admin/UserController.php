<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('users')->where('userType', 'Usuario')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $state = 'Listo';
        $message = '';
        $alert_class = 'alert-success';
        $user = User::find($id);
        if($user){
            try{
                if($user->status == 'activo'){
                    $user->status = 'inactivo';
                    $message = 'El usuario fue desactivado exitosamente.';
                }else{
                    $user->status = 'activo';
                    $message = 'El usuario activado exitosamente.';
                }
                $user->save();
            }catch(Exception $exception){
                $state = 'Listo';
                $mensaje = 'El usuario no pudo ser editado.';
                $alert_class = 'alert-warning';
            }
        }else{
            $state = 'Error';
            $message = 'El usuario que intentaba editar ya no existe.';
            $alert_class = 'alert-warning';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/users');
    }
}
