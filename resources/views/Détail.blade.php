@extends('trame.app')

@section('title','Détail')

@section('contenu')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
.table-detail-commande {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 30%;
    margin: 50px auto 20px auto;
    margin-top: 35px;

}

.table-detail-commande td,
.table-detail-commande th {
    border: 1px solid #ddd;
    padding: 8px;
}

.table-detail-commande tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-detail-commande th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}

.table-detail-commande a {
    color: #4CAF50;
    text-decoration: none;
    margin-top: 20px;
}

.btn-retour {
    margin-top: 20px;
}

.navbar {
    border-radius: 0;
    height: 56px;
}

.fa-home {
    font-size: 1.3em;

}

h2 {

    font-size: 28px;
    font-weight: 700;
    margin-top: 40px;
    text-align: center;
    color: #4CAF50;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse " id="navb">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link center ml-2" href="{{route('home')}}">
                            <i class="fa fa-home"></i> <span style="font-size: 16px;">Home</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

<h2 class="text-center mb-4">Détails de la commande n°{{$id}} : </h2>
<table class="table-detail-commande">
    <tr>
        <th nowrap class="text-center">Nom de la pizza</th>
        <th nowrap class="text-center">Quantité commandée</th>
        @if ($type != 'cook')
        <th nowrap class="text-center">prix</th>
        @endif
    </tr>
    @if ($type != 'cook')
    @foreach ($pizza as $p)
    <tr>
        <td nowrap class="text-center">{{$p->nom}}</td>
        <td nowrap class="text-center">{{$qte[$p->id]}}</td>
        <td nowrap class="text-center">{{$p->prix * $qte[$p->id]}} €</td>
    </tr>
    @endforeach
    <tr>
        <td></td>
        <td nowrap class="text-center"><strong>Prix total : </strong></td>
        <td nowrap class="text-center"><strong>{{$total}} €</strong></td>
    </tr>
    @elseif ($type == 'cook')
    @foreach ($pizza as $p)
    <tr>
        <td nowrap class="text-center">{{$p->nom}}</td>
        <td nowrap class="text-center">{{$qte[$p->id]}}</td>
    </tr>
    @endforeach
    @endif
</table>
@if ($type == 'admin')
<div class="text-center">
    <a href="{{ URL::previous() }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@elseif ($type == 'user')
<div class="text-center">
    <a href="{{route('commandeEnv')}}" class="btn btn-secondary mt-3">Retour</a>
</div>
@elseif ($type == 'cook')
<div class="text-center">
    <a href="{{ URL::previous() }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endif


@endsection