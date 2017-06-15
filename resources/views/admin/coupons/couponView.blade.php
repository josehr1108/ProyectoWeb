@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 arriba">
                <div class="panel panel-info">
                    <div class="panel-heading">{{$coupon->information}}</div>
                    <div class="panel-body">
                        <img src="{{$coupon->image}}" class="img-rounded center-block img-responsive"  width="600" height="400">
                    </div>
                </div>
            </div>
            <div class="col-md-4 arriba1">
                <div class="panel panel-info">
                    <div class="panel-heading infoCoupon centrarText">Información</div>
                    <div class="panel-body">
                        <h2 class="centrarText">${{$coupon->current_price}}</h2>
                        <h4 class="centrarText"><s>${{$coupon->original_price}}</s></h4>
                        <hr/>
                        <h4 class="centrarText">Ahorre: {{$coupon->discount}}%</h4>
                        <h4 class="centrarText">Perodio: {{$coupon->use_interval}}</h4>
                        <h4 class="centrarText">Luhar: {{$coupon->city}}</h4>
                        <h4 class="centrarText">Horario: {{$coupon->schedule}}</h4>
                        <h4 class="centrarText">Cómo llegar: {{$coupon->address}}</h4>
                        <h4 class="centrarText">Finaliza: {{$coupon->expiration_date}}</h4>
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
                                <div id="comentarios">
                                    @foreach ($comments as $comment)
                                    <div class="panel panel-primary bajito">
                                        <div class="panel-heading infoCoupon"><h4>{{$comment->user_name}}</h4></div>
                                        <div class="panel-body">
                                            <h5>{{$comment->message}}</h5>
                                        </div>
                                    </div>
                                    @endforeach

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
                                                <button onclick="newComent({{Auth::user()}},{{$coupon->id}})" type="button" class="btn btn-primary">Comentar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button onclick="correo({{$coupon->id}})" id="correo" class="btn btn-primary"> Enviar Información por correo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function newComent(user, couponId) {
            var userName = user.name;
            var mensaje = $('#message-text').val();
            var comment = {'user_name':userName, 'message':mensaje};

            var url = '/commentCoupon/' + couponId;
            $.ajax({
                type: "POST",
                url: url,
                data: comment,
                success: function (res) {
                    console.log(res.data);
                },
                error: function (err) {
                    console.log(err.data);
                }
            });
        }

        function correo(id){
            var url = '/basicemail/' + id;
            console.log("Url: "+url);
            $.get(url,function (res) {
                console.log("res");
            });
        }
    </script>
@endsection