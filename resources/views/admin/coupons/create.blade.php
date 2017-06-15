@extends('layouts.app')

@section('content')
<div class="container space">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default shadow">
                <div class="panel-heading"><b>Crear un cupón</b></div>
                <div class="panel-body">
                    {!!Form::open(['route'=>'admin.coupons.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!!Form::label('information', 'Información:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::textarea('information', '', ['class'=>'form-control textarea', 'required'=>'required', 'rows'=>5])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('image', 'URL de la imagen:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('image', '', ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('expiration_date', 'Fecha de expiración:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::date('expiration_date', \Carbon\Carbon::tomorrow(), ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('type', 'Tipo:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('type', '', ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('discount', 'Descuento (%):', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-2">
                                {!!Form::number('discount', '', ['class'=>'form-control', 'required'=>'required', 'min'=>0, 'max'=>90])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('original_price', 'Precio original (¢):', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-3">
                                {!!Form::number('original_price', '', ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('city', 'Ciudad:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('city', '', ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('address', 'Dirección:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::textarea('address', '', ['class'=>'form-control textarea', 'required'=>'required', 'rows'=>3])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('schedule', 'Horario:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::textarea('schedule', '', ['class'=>'form-control textarea', 'required'=>'required', 'rows'=>3])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('use_interval', 'Intervalo de uso:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('use_interval', '', ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!!Form::submit('Crear cupón', ['class'=>'btn button'])!!}
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
