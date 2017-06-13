@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <aside class="col-xs-3" id="top5Aside">
                <div class="sidebar-nav">
                    <div id="brandLogo"></div>
                    <ul class="nav nav-list">
                        <li class="nav-header"><span>Top 5 cupones</span></li>
                        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li class="nav-header"><span>Top 5 promociones</span></li>
                        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                    </ul>
                </div>
            </aside>
            <div class="col-xs-9" style="padding-top: 1%">
                <div class="panel panel-default sectionPanel">
                    <div class="panel-heading">
                        Cupones
                    </div>
                    <div class="panel-body" id="couponList">
                        <div class="sortAndSearch">
                            <div class="dropdown pull-right">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Ordenar por
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="name">Nombre</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="city">Ciudad</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="type">Tipo</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="expiration_date">Fecha de Expiración</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="discountTip">Descuento</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="priceTip">Precio</a></li>
                                </ul>
                            </div>
                            <div class="pull-left">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input class="search" placeholder="Busca por palabra clave"/>
                            </div>
                        </div>
                        <ul class="list">
                            @foreach($cupones as $cupon)
                            <li>
                                <div class="elementContainer">
                                    <a href="/coupon/{{$cupon->id}}">
                                        <div class="imgContainer shadow" style="background: #1b6d85 url({{$cupon->image}}) no-repeat center">
                                            <div class="priceTip">¢{{$cupon->current_price}}</div>
                                            <div class="discountTip">{{$cupon->discount}}% descuento</div>
                                        </div>
                                    </a>
                                    <div class="elementInfo">
                                        <h3 class="name">{{$cupon->information}}</h3>
                                        <span class="city"><b>Ciudad: </b>{{$cupon->city}}</span>
                                        <span class="type"><b>Tipo: </b>{{$cupon->type}}</span>
                                        <span class="expiration_date"><b>Fecha de expiración: </b>{{$cupon->expiration_date}}</span>
                                        <span class="original_price"><b>Precio Original: </b>¢{{$cupon->original_price}}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="paginationContainer">
                            <ul class="pagination"></ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default sectionPanel">
                    <div class="panel-heading">
                        Promociones
                    </div>
                    <div class="panel-body" id="promotionList">
                        <div class="sortAndSearch">
                            <div class="dropdown pull-right">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menu2" data-toggle="dropdown">Ordenar por
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="title">Titulo</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="priceTip2">Precio</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="saving">Ahorro</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="sort" data-sort="discountTip2">Descuento</a></li>
                                </ul>
                            </div>
                            <div class="pull-left">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input class="search" placeholder="Busca por palabra clave"/>
                            </div>
                        </div>
                        <ul class="list">
                            @foreach($promociones as $promocion)
                                <li>
                                    <div class="elementContainer">
                                        <a href="/promotion/{{$promocion->id}}">
                                            <div class="imgContainer shadow" style="background: #1b6d85 url({{$promocion->image}}) no-repeat center">
                                                <div class="priceTip">¢{{$promocion->current_price}}</div>
                                                <div class="discountTip">{{$promocion->discount}}% descuento</div>
                                            </div>
                                        </a>
                                        <div class="elementInfo">
                                            <h3 class="title">{{$promocion->title}}</h3>
                                            <span class="description"><b>Descripción: </b>{{$promocion->description}}</span>
                                            <span class="original_price"><b>Precio Original: </b>¢{{$promocion->original_price}}</span>
                                            <span class="saving"><b>Ahorro: </b>¢{{$promocion->saving}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="paginationContainer">
                            <ul class="pagination"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let couponOptions = {
            valueNames: [ 'name', 'city','type','expiration_date','discountTip','priceTip'],
            page: 3,
            pagination: true
        };

        let promotionOptions = {
            valueNames: [ 'title','description','image','priceTip','original_price','saving','discountTip'],
            page: 3,
            pagination: true
        };

        let couponList = new List('couponList', couponOptions);
        let promotionList = new List('promotionList',promotionOptions);

    </script>
@endsection
