@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-inline" method="post" action="">
            <div class="form-group">
                <label for="information">Información:</label>
                <input type="text" class="form-control" name="information" placeholder="Información">
            </div>
            <div class="form-group">
                <label for="expiration_date">Feccha de Caducidad:</label>
                <input type="date" class="form-control" name="expiration_date" placeholder="Feccha de Caducidad">
            </div>
            <div class="form-group">
                <label for="image">Imagen:</label>
                <input type="date" class="form-control" name="image" placeholder="Imagen">
            </div>
            <div class="form-group">
                <label for="type">Tipo:</label>
                <input type="text" class="form-control" name="type" placeholder="Tipo">
            </div>
            <div class="form-group">
                <label for="discount">Descuento:</label>
                <input type="text" class="form-control" name="discount" placeholder="Descuento">
            </div>
            <div class="form-group">
                <label for="original_price">Precio Original:</label>
                <input type="number" class="form-control" name="original_price" placeholder="Precio Original">
            </div>
            <div class="form-group">
                <label for="current_price">Precio Actual:</label>
                <input type="number" class="form-control" name="current_price" placeholder="Precio Actual">
            </div>
            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input type="text" class="form-control" name="city" placeholder="Ciudad">
            </div>
            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" class="form-control" name="address" placeholder="Dirección">
            </div>
            <div class="form-group">
                <label for="schedule">Horario:</label>
                <input type="text" class="form-control" name="schedule" placeholder="Horario">
            </div>
            <div class="form-group">
                <label for="use_interval">Periodo de uso:</label>
                <input type="text" class="form-control" name="use_interval" placeholder="Periodo de uso">
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection
