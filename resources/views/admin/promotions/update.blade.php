@extends('layouts.app')

@section('content')
<div class="container space">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default shadow">
                <div class="panel-heading"><b>Editar una promoción</b></div>
                <div class="panel-body">
                    {!!Form::open(['route'=>['admin.promotions.update', $promotion->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!!Form::label('title', 'Título:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('title', $promotion->title, ['class'=>'form-control', 'required'=>'required', 'autofocus'=>'autofocus'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('description', 'Descripción:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::textarea('description', $promotion->description, ['class'=>'form-control textarea', 'required'=>'required', 'rows'=>3])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('secondary_description', 'Descripción secundaria:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::textarea('secondary_description', $promotion->secondary_description, ['class'=>'form-control textarea', 'required'=>'required', 'rows'=>3])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('image', 'URL de la imagen:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('image', $promotion->image, ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('web_page', 'Sitio web:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('web_page', $promotion->web_page, ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('original_price', 'Precio original (¢):', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-3">
                                {!!Form::number('original_price', $promotion->original_price, ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('discount', 'Descuento (%):', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-2">
                                {!!Form::number('discount', $promotion->discount, ['class'=>'form-control', 'required'=>'required', 'min'=>0, 'max'=>90])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('address', 'Dirección:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::textarea('address', $promotion->address, ['class'=>'form-control textarea', 'required'=>'required', 'rows'=>3])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!!Form::submit('Actualizar promoción', ['class'=>'btn button'])!!}
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
