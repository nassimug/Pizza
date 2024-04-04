@extends('trame.app')

@section('title', 'home')

@section('contenu')


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-LzEJ6C1L6zXU6G2ZOlYYsZAmOgOw/BTBGxhWKCxrLzOqlodCGNSvoO9/fccTJzMO8MSq0o0S/cFxl1CiDIy1Rg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
    integrity="sha512-nhZt3iBC3wFZaKjcbGGkRyIMYllYd4j4t4+XtR5R5IHyKjV0rSVxMx5z7Wb3Kbt3V7LUpiLXuZj/tKVOfp1vOw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
.container {
    margin-top: 80px;
}

.navbar {
    border-radius: 0;
    height: 56px;
}

.fa-home {
    font-size: 1.3em;
}

.btn {
    margin-top: 2px;
    margin-bottom: 2px;
}

.card {
    margin-top: 60px;
    margin-left: 30px;
    margin-right: 30px;
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-title {
    font-size: 1.5rem;
    font-weight: bold;
}

.card-text {
    font-size: 1.2rem;
    color: #777;
}

.price {
    font-size: 1.5rem;
    color: #f8b700;
    font-weight: bold;
}

.btn-group {
    margin-top: 10px;
}

.btn-group .btn {
    margin-right: 10px;
}

.btn-group .btn:last-child {
    margin-right: 0;
}


.edit-image {
    display: block;
    position: relative;
}

.img-editable:hover {
    opacity: 0.5;
    transition: opacity 0.1s ease-in-out;
}

.edit-text {
    position: absolute;
    bottom: 90px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 16px;
    font-weight: bold;
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.edit-image:hover .edit-text {
    opacity: 1;
}

.btn-success {
    margin-top: 10px;
    margin-bottom: 10px;
}

.btn-danger {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-0">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb" aria-controls="navb"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link ml-2" href="{{route('home')}}">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <button class="btn btn-primary btn-sm "><i class="fa fa-sign-in"> </i> Connexion</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <button class="btn btn-secondary btn-sm"><i class=" fa fa-user-plus"> </i>
                                Inscription</button>
                        </a>
                    </li>

                    @endguest
                    @auth

                    <li class="nav-item dropdown mr-2 mt-1 ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tasks">

                                <span class="badge badge-primary"></span>
                            </i>
                            Gérer les commandes
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if($type == 'admin')
                            <a class="dropdown-item" href="{{route('ajouter')}}"><i class="fa fa-plus-circle"></i>
                                Ajouter une pizza au menu</a>
                            <a class="dropdown-item" href="{{route('adminCommande')}}"><i class="fa fa-tasks"></i>
                                Commandes</a>
                            <a class="dropdown-item" href="{{route('recette')}}"><i class="fa fa-dollar"
                                    aria-hidden="true"></i> Recette du jour</a>
                            @elseif($type == 'user')
                            <a class="dropdown-item" href="{{route('commandeEnv')}}"><i class="fa fa-clipboard"></i>
                                Commandes passées</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-2 mt-1 ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-gears">

                                <span class="badge badge-primary"></span>
                            </i>
                            Gérer les comptes
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if($type == 'admin')
                            <a class="dropdown-item" href="{{route('createAdmin')}}"><i class="fa fa-user-plus"
                                    aria-hidden="true"></i> Créer un compte admin</a>
                            <a class="dropdown-item" href="{{route('createCook')}}"><i class="fa fa-user-plus"
                                    aria-hidden="true"></i> Créer un compte pizzaiolo</a>
                            <a class="dropdown-item" href="{{route('utilisateurs.index')}}"><i class="fa fa-users"
                                    aria-hidden="true"></i> Liste des utilisateurs</a>
                            @endif
                            <a class="dropdown-item" href="{{route('modifMDP')}}"><i class="fa fa-lock"></i> Changer le
                                mot de passe</a>
                        </div>
                    </li>
                    @if($type == 'user')
                    <a class="btn btn-success btn-sm ml-3" href="{{route('panier')}}">
                        <i class="fa fa-shopping-cart "></i> Panier
                    </a>
                    @endif
                    <a class="btn btn-danger btn-sm ml-3" href="{{route('logout')}}">
                        <i class="fa fa-sign-out "></i> Déconnexion
                    </a>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</body>

<div class="row">
    @foreach($pizza as $p)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm card-fixed-height">
            @csrf
            @auth
            @if($type == 'admin')
            <a href="{{ route('modification', ['id' => $p->id]) }}" class="edit-image">
                <img src="{{ asset('images/' . $p->image) }}" alt="{{ $p->nom }}" class="card-img-top img-editable">
                <div class="edit-text">Modifier l'image</div>
            </a>
            @elseif($type == 'user')
            <img src="{{ asset('images/' . $p->image) }}" alt="{{ $p->nom }}" class="card-img-top ">
            @endif
            @endauth
            @guest
            <img src="{{ asset('images/' . $p->image) }}" alt="{{ $p->nom }}" class="card-img-top ">
            @endguest
            <div class="card-body">
                <div class="price">{{ $p->prix }} €</div>
                <h5 class="card-title">{{ $p->nom }}</h5>
                <p class="card-text">{{ Str::limit($p->description, 25, '...') }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        @auth
                        @if($type == 'user')
                        <a href="{{route('ajoutPanier',['nom'=>$p->nom])}}"
                            class="btn btn-sm btn-outline-primary">Ajouter au panier</a>
                        @elseif($type == 'admin')
                        <a href="{{route('modification',['id'=>$p->id])}}"
                            class="btn btn-sm btn-outline-secondary">Modifier</a>
                        <form action="{{ route('supprimer', ['id' => $p->id]) }}" method="POST" id="formSupprimer">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirmSupprimer()">Supprimer</button>
                        </form>

                        <script>
                        function confirmSupprimer() {
                            if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
                                document.getElementById('formSupprimer').submit();
                            }
                            return false;
                        }
                        </script>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


<div class="d-flex justify-content-center" style="margin-top: 50px;">
    <div>
        {{$pizza->links()}}
    </div>
</div>
<footer style="position: absolute; bottom: 0; width: 100%;">
    <div class="text-center p-3 mb-0" style="background-color: #3e4551; color: #fff;">
        © 2023 Copyright:
        <a class="text-white" href="https://eprel.u-pec.fr/my/">TM-4-5</a>
    </div>
</footer>


@endsection