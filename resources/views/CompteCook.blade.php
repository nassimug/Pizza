@extends('trame.app')

@section('title', 'Création pizzaiolo')

@section('contenu')


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
.navbar {
    border-radius: 0;
    height: 56px;
}

.fa-home {
    font-size: 1.3em;
}

.container {
    margin-top: 50px;
}

.card-body {
    margin-bottom: -30px;
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

<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4 text-center">Création pizzaiolo</h1>
                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-2 text-muted" for="nom">Nom</label>
                                        <input id="nom" type="text" class="form-control" name="nom" required autofocus>
                                    </div>
                                    <div class="col">
                                        <label class="mb-2 text-muted" for="prenom">Prénom</label>
                                        <input id="prenom" type="text" class="form-control" name="prenom" required
                                            autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="login">Login</label>
                                <input id="login" type="text" class="form-control" name="login" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="mdp">Mot de passe</label>
                                <input id="mdp" type="password" class="form-control" name="mdp" required>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="mdp_confirmation">Confirmation mot de passe</label>
                                <input id="mdp_confirmation" type="password" class="form-control"
                                    name="mdp_confirmation" required>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Créer
                                </button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection