@extends('trame.app')

@section('title', 'Cook')

@section('contenu')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
<style>.table {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin: 50px auto 20px auto;
    margin-top: 20px;
}

.table td,
.table th {
    border: 1px solid #ddd;
    padding: 8px;
}

.table tr {
    background-color: white;
}

.table th {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}

.table a {
    color: #4CAF50;
    text-decoration: none;
    margin-top: 20px;
}

.container {
    margin-top: 50px;
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

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb" aria-controls="navb"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link ml-2" href="{{route('home')}}">
                            <i class="fa fa-home"></i> Home <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Sign In</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item dropdown mt-1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-gears">
                                <span class="badge badge-primary"></span>
                            </i> Gérer le compte
                        </a>
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('modifMDP')}}"><i class="fa fa-lock"></i> Changer le
                                mot de passe</a>
                        </div>
                    </li>
                    <a class="nav-link ml-3" href="{{route('logout')}}"><button class="btn btn-danger btn-sm"><i
                                class="fa fa-sign-out"></i> Déconnexion</button></a>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</body>

<div class="container-fluid">

    <h2 class="text-center mb-4">Commandes clients :</h2>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th nowrap class="text-center">Commande n°</th>
                        <th nowrap class="text-center">ID client</th>
                        <th nowrap class="text-center">Statut</th>
                        <th nowrap class="text-center">Création</th>
                        <th nowrap class="text-center">Mise à jour</th>
                        <th nowrap class="text-center">Détails</th>
                        <th nowrap class="text-center">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $c)
                    @if ($c->statut == 'envoye' || $c->statut == 'traitement' || $c->statut == 'pret')
                    <tr>
                        <td nowrap class="text-center">{{ $c->id }}</td>
                        <td nowrap class="text-center">{{ $c->user_id }}</td>
                        <td nowrap class="text-center">{{ $c->statut }}</td>
                        <td nowrap class="text-center">{{ $c->created_at }}</td>
                        <td nowrap class="text-center">{{ $c->updated_at }}</td>
                        <td nowrap class="text-center"><a
                                href="{{ route('detailCommande', ['id' => $c->id]) }}">Détail</a></td>
                        <td nowrap class="text-center"><a
                                href="{{ route('statutView', ['id' => $c->id]) }}">Modifier</a></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

<div class="d-flex justify-content-center" style="margin-top: 50px;">
    @empty($noPaginate)
    {{$commandes->links()}}
    @endempty
</div>

@endsection