@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 arriba">
                <div class="panel panel-info">
                    <div class="panel-heading">{{$promocion->description}}</div>
                    <div class="panel-body">
                        <img src="{{$promocion->image}}" class="img-rounded center-block img-responsive"  width="600" height="400">
                    </div>
                </div>
            </div>
            <div class="col-md-4 arriba1">
                <div class="panel panel-info">
                    <div class="panel-heading infoCoupon centrarText">Información</div>
                    <div class="panel-body">
                        <h2 class="centrarText">${{$promocion->current_price}}</h2>
                        <h4 class="centrarText"><s>${{$promocion->original_price}}</s></h4>
                        <hr/>
                        <h4 class="centrarText">Ahorre: {{$promocion->discount}}%</h4>
                        <h4 class="centrarText">Perodio: {{$promocion->saving}}</h4>
                        <h4 class="centrarText">Luhar: {{$promocion->title}}</h4>
                        <h4 class="centrarText">Horario: {{$promocion->secondary_description}}</h4>
                        <h4 class="centrarText">Cómo llegar: {{$promocion->address}}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary infoCoupon">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row arriba2">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading infoCoupon">Comentarios</div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div id="comments">
                                    <div class="panel panel-primary bajito">
                                        <div class="panel-heading infoCoupon"><h4>Daryn Soto</h4></div>
                                        <div class="panel-body">
                                            <h5>Vaamos por ese puro pero ya.</h5>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Comentar</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">Comentario nuevo</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Comentario:</label>
                                                        <textarea class="form-control" id="message-text"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button onclick="newComent()" type="button" class="btn btn-primary">Comentar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function newComent() {
            var txt1 = $("<div></div>").addClass('panel panel-primary bajito');
            var txt2 = $("<div></div>").addClass( 'panel-heading infoCoupon');
            var txt5 = "<h4>{{Auth::user()->name}}</h4>";
            $(txt2).append(txt5);
            $(txt1).append(txt2);

            var txt3 = $("<div></div>").addClass('panel-body');
            var textArea = $('#message-text').val();
            var txt4 = "<h5>"+ textArea + "</h5>";
            $(txt3).append(txt4);
            $(txt1).append(txt3);

            $("#comments").append(txt1);
        }
    </script>
@endsection