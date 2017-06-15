@extends('layouts.app')

@section('content')
@if(Session::has('state'))
    <div class="alert {{ Session::get('alert_class') }} alert-dismissible show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>¡{{Session::get('state')}}!</strong> {{Session::get('message')}}
    </div>
@endif
<table class="table">
    <thead>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Operaciones</th>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tbody>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            @if($user->status == 'activo')
                {!!link_to_route('admin.users.edit', $title='Desactivar', $parameters=$user->id, $attributes=['class'=>'btn btn-warning'])!!}
            @else
                {!!link_to_route('admin.users.edit', $title='Activar', $parameters=$user->id, $attributes=['class'=>'btn btn-warning'])!!}
            @endif
        </td>
    </tbody>
    @endforeach
    </tbody>
</table>
@endsection
