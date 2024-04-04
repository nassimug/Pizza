@extends('trame.app')

@section('title', 'Panier',)

@section('contenu')


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="bootstrap.bundle.min.js / bootstrap.bundle.js">


<style>
.container {
    margin-top: 20px;
    margin-left: 300px;
}

.navbar {
    border-radius: 0;
    height: 56px;
}

.fa-home {
    font-size: 1.5em;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse " id="navb">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link ml" href="{{route('home')}}">
                            <i class="fa fa-home"></i> <span style="font-size: 16px;">Home</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

<div class="container ">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Panier</h5>
                            </div>
                            <div class="col-xs-6"> <a href="{{route('home')}}">
                                    <button type="button" class="btn btn-primary btn-sm btn-block">
                                        <span class="glyphicon glyphicon-share-alt"></span> Retour au menu
                                    </button> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <hr>
                    @foreach($panier as $key=>$val)
                    <div class="row">
                        <div class="col-xs-3 " style="margin-bottom: 10px;"><img
                                src="{{ asset('images/' . $pizza->where('nom', $key)->first()->image) }}"
                                style="width: 100px; height: 80px;"></div>

                        <div class="col-xs-4">
                            <h4 class="product-name "><strong>
                                    <td>{{$key}} </td>
                                </strong></h4>
                            prix unité : {{ $val[1] }} €
                        </div>

                        <div class="col-xs-5 " style="margin-top: 25px;">
                            <div class="col-xs-4">
                                <input type="text" class="form-control input-sm text-center" value="{{ $val[0] }}"
                                    readonly>
                            </div>
                            <div class="col-xs-2"> <a href="{{route('ajoutPanierRapide',['nom'=>$key])}}">
                                    <button type="button" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-plus"> </span>
                                    </button></a>
                            </div>
                            <div class="col-xs-2"> <a href="{{route('deletePanier',['nom'=>$key])}}">
                                    <button type="button" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                </div>
                @if (!empty($panier))
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total : <strong>{{$total}} €</strong></h4>
                        </div>
                        <div class="col-xs-3"> <a href="{{route('creationCommande',['panier'=>$panier])}}">
                                <button type="button" class="btn btn-success btn-block">
                                    Commander
                                </button> </a>
                        </div>
                    </div>
                </div>
                @elseif (empty($panier))
                <div class="alert alert-info">
                    Votre panier est vide.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection