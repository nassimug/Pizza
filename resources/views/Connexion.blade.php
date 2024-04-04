@extends('trame.app')

@section('title', 'Connexion')

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
                        <h1 class="fs-4 card-title fw-bold mb-4 text-center">Connexion</h1>
                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="login">Login</label>
                                <input id="login" type="text" class="form-control" name="login" required autofocus>
                            </div>
                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="mdp">Mot de passe</label>
                                </div>
                                <input id="mdp" type="password" class="form-control" name="mdp" required>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Se souvenir </label>
                                </div>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Connexion
                                </button>
                            </div>
                            @csrf
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Pas de compte ? <a href="{{ route('register') }}" class="text-blue"> Créez un compte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection