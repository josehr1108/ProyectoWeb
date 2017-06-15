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
<div class="centered-div">
    <form action="{{ url('admin/coupons/create') }}" class="button-container">
        <input type="submit" value="Crear nuevo cupón" class="btn btn-success"/>
    </form>
</div>
<table class="table">
    <thead>
        <th>Información</th>
        <th>Imagen</th>
        <th>Fecha de expiración</th>
        <th>Tipo</th>
        <th>Descuento</th>
        <th>Precio original</th>
        <th>Precio actual</th>
        <th>Ciudad</th>
        <th>Dirección</th>
        <th>Horario</th>
        <th>Intervalo de uso</th>
        <th>Operaciones</th>
    </thead>
    <tbody>
    @foreach($coupons as $coupon)
    <tbody>
        <td><textarea class="textarea-table" rows="5" cols="30" readonly>{{$coupon->information}}</textarea></td>
        <td>{{$coupon->image}}</td>
        <td>{{$coupon->expiration_date}}</td>
        <td>{{$coupon->type}}</td>
        <td>{{$coupon->discount}}%</td>
        <td>¢{{number_format($coupon->original_price, 0, '', ' ')}}</td>
        <td>¢{{number_format($coupon->current_price, 0, '', ' ')}}</td>
        <td>{{$coupon->city}}</td>
        <td><textarea class="textarea-table" rows="3" cols="25" readonly>{{$coupon->address}}</textarea></td>
        <td><textarea class="textarea-table" rows="3" cols="25" readonly>{{$coupon->schedule}}</textarea></td>
        <td>{{$coupon->use_interval}}</td>
        <td>
            {!!link_to_route('admin.coupons.show', $title='Editar', $parameters=$coupon->id, $attributes=['class'=>'btn btn-primary'])!!}
            {!!Form::open(['method' => 'DELETE', 'route' => ['admin.coupons.destroy', $coupon->id]])!!}
                {!!Form::hidden('id', $coupon->id)!!}
                {!!Form::submit('Eliminar', ['class' => 'btn btn-danger'])!!}
            {!!Form::close()!!}
            @if($coupon->status == 'activo')
                {!!link_to_route('admin.coupons.edit', $title='Desactivar', $parameters=$coupon->id, $attributes=['class'=>'btn btn-warning'])!!}
            @else
                {!!link_to_route('admin.coupons.edit', $title='Activar', $parameters=$coupon->id, $attributes=['class'=>'btn btn-warning'])!!}
            @endif
        </td>
    </tbody>
    @endforeach
    </tbody>
</table>
@endsection
