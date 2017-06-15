@extends('layouts.app')

@section('content')
    @if(Session::has('state'))
        <div class="alert {{ Session::get('alert_class') }} alert-dismissible show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>¡{{ Session::get('state') }}!</strong> {{ Session::get('message') }}
        </div>
    @endif
    <div class="centered-div">
        <form action="{{ url('admin/promotions/create') }}" class="button-container">
            <input type="submit" value="Crear nueva promoción" class="btn btn-success"/>
        </form>
    </div>
    <table class="table">
        <thead>
            <th>Título</th>
            <th>Descripción</th>
            <th>Descripción secundaria</th>
            <th>Imagen</th>
            <th>Página web</th>
            <th>Precio original</th>
            <th>Precio actual</th>
            <th>Ahorro</th>
            <th>Descuento</th>
            <th>Dirección</th>
            <th>Operaciones</th>
        </thead>
        <tbody>
        @foreach($promotions as $promotion)
        <tbody>
            <td>{{$promotion->title}}</td>
            <td><textarea class="textarea-table" rows="5" cols="30" readonly>{{$promotion->description}}</textarea></td>
            <td><textarea class="textarea-table" rows="5" cols="30" readonly>{{$promotion->secondary_description}}</textarea></td>
            <td><textarea class="textarea-table" rows="3" cols="25" readonly>{{$promotion->image}}</textarea></td>
            <td>{{$promotion->web_page}}</td>
            <td>{{number_format($promotion->original_price, 0, '', ' ')}}¢</td>
            <td>{{number_format($promotion->current_price, 0, '', ' ')}}¢</td>
            <td>{{number_format($promotion->saving, 0, '', ' ')}}¢</td>
            <td>{{$promotion->discount}}%</td>
            <td><textarea class="textarea-table" rows="3" cols="25" readonly>{{$promotion->address}}</textarea></td>
            <td>
                {!!link_to_route('admin.promotions.show', $title='Editar', $parameters=$promotion->id, $attributes=['class'=>'btn btn-primary'])!!}
                {!!Form::open(['method' => 'DELETE', 'route' => ['admin.promotions.destroy', $promotion->id]])!!}
                    {!!Form::hidden('id', $promotion->id)!!}
                    {!!Form::submit('Eliminar', ['class' => 'btn btn-danger'])!!}
                {!!Form::close()!!}
                @if($promotion->status == 'Activo')
                    {!!link_to_route('admin.promotions.edit', $title='Desactivar', $parameters=$promotion->id, $attributes=['class'=>'btn btn-warning'])!!}
                @else
                    {!!link_to_route('admin.promotions.edit', $title='Activar', $parameters=$promotion->id, $attributes=['class'=>'btn btn-warning'])!!}
                @endif
            </td>
        </tbody>
        @endforeach
        </tbody>
    </table>
@endsection
