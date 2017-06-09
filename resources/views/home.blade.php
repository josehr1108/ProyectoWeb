@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <aside class="col-xs-3" id="top5Aside">
                <div class="sidebar-nav">
                    <div id="brandLogo"></div>
                    <ul class="nav nav-list">
                        <li class="nav-header"><span>Top 5 cupones</span></li>
                        <li class="active"><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li class="active"><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li class="active"><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li class="nav-header"><span>Top 5 promociones</span></li>

                        <li class="active"><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li class="active"><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                        <li class="active"><a href="#"><i class="glyphicon glyphicon-star"></i> Sumergete en un mundo de pura crap y basura</a></li>
                    </ul>
                </div>
            </aside>
            <div class="col-xs-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="/coupon/coupon">Cupon </a>
                    </div>
                    <div class="panel-body">
                        You are logged in {{Auth::user()->name}}!
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
