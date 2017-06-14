<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('users')->where('userType', 'Usuario');
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function update($id)
    {
        return view('admin.users.update', compact('id'));
    }

    public function destroy($id)
    {
        return view('admin.users.destroy', compact('id'));
    }
}
