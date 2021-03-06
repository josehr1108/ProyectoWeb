@extends('layouts.app')

@section('content')
    <div class="container space">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default shadow">
                    <div class="panel-heading"><b>Contacta con nosotros</b></div>
                    <div class="panel-body">
                        {!!Form::open(['route'=>'admin.promotions.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!!Form::label('nombre', 'Nombre:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('nombre', '', ['class'=>'form-control', 'required'=>'required', 'autofocus'=>'autofocus'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('email', 'Email:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('email', '', ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('mensaje', 'Mensaje:', ['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::textarea('mensaje', '', ['class'=>'form-control', 'required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!!Form::submit('Enviar', ['class'=>'btn button'])!!}
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="mapTip">
        <h2>O buscanos en nuestra oficina!</h2>
        <div id="map"></div>
    </div>
    <script>
        function initMap() {
            var moviles = {lat: 10.361073, lng: -84.510032};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: moviles
            });
            var marker = new google.maps.Marker({
                position: moviles,
                map: map
            });
        }
    </script>

@endsection