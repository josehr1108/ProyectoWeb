@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 arriba">
                <div class="panel panel-default">
                    <div class="panel-heading">Info</div>
                    <div class="panel-body">
                        <img src="http://localhost:8000/images/coupon.jpg" class="img-rounded center-block img-responsive"  width="600" height="400">
                    </div>
                </div>
            </div>
            <div class="col-md-4 arriba1">
                <div class="panel panel-default">
                    <div class="panel-heading">Info</div>
                    <div class="panel-body">
                        <h2 style="text-align: center">$420</h2>
                        <h4 style="text-align: center"><s>$840</s></h4>
                        <hr/>
                        <h4 style="text-align: center">Ahorre: 50%</h4>
                        <h4 style="text-align: center">Perodio: 07/11/2015 al 08/1272015</h4>
                        <h4 style="text-align: center">Luhar: Heredia</h4>
                        <h4 style="text-align: center">Horario: Lunes a viernes de 8:00 a.m. a 5:00 p.m. </h4>
                        <h4 style="text-align: center">Cómo llegar: Heredia, Belén de la plaza 150m Oeste.</h4>
                        <h4 style="text-align: center">Finaliza: 17 Jun</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row arriba2">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Comentarios</div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div id="comments">
                                    <div class="panel panel-default bajito">
                                        <div class="panel-heading"><h4>Daryn Soto</h4></div>
                                        <div class="panel-body">
                                            <h5>Vamos por ese puro pesro ya.</h5>
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
                                                <button onclick="newComent()" type="button" class="btn btn-primary">Enviar</button>
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
            var txt1 = $("<div></div>").addClass('panel panel-default bajito');
            var txt2 = $("<div></div>").addClass( 'panel-heading');
            var txt5 = "<h4>Daryn Soto</h4>";
            $(txt2).append(txt5);
            $(txt1).append(txt2);

            var txt3 = $("<div></div>").addClass('panel-body');
            var txt4 = "<h5>Vamos por ese puro pero ya.</h5>";
            $(txt3).append(txt4);
            $(txt1).append(txt3);

            $("#comments").append(txt1);
        }
    </script>
@endsection