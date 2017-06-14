@extends('layouts.app')

@section('content')
    <div class="centered-div">
        <form action="{{ url('admin/promotions/create') }}" class="button-container">
            <input type="submit" value="Create a new user" class="button"/>
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
            <td>{{$promotion->description}}</td>
            <td>{{$promotion->secondary_description}}</td>
            <td>{{$promotion->image}}</td>
            <td>{{$promotion->web_page}}</td>
            <td>{{$promotion->original_price}}</td>
            <td>{{$promotion->current_price}}</td>
            <td>{{$promotion->saving}}%</td>
            <td>{{$promotion->discount}}</td>
            <td>{{$promotion->address}}</td>
            <th>
                {!!link_to_route('admin.promotions.edit', $title='Editar', $parameters=$promotion->id, $attributes=['class'=>'button'])!!}
                {!!link_to_route('admin.promotions.destroy', $title='Eliminar', $parameters=$promotion->id, $attributes=['class'=>'button'])!!}
                {!!link_to_route('admin.promotions.updateState', $title='Estado', $parameters=$promotion->id, $attributes=['class'=>'button'])!!}
            </th>
        </tbody>
        @endforeach
        </tbody>
    </table>
@endsection
