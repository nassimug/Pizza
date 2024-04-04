@extends('trame.app')

@section('title', 'Recherche par date')

@section('contenu')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<style>
.container {
    margin-top: 50px;
}

.card {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: none;
    border-radius: 10px;
    overflow: hidden;
}

.card-header {
    background-color: #4CAF50;
    color: white;
    font-size: 24px;
    font-weight: bold;
    border-bottom: 1px solid #dee2e6;
    padding: 5px;
    margin-bottom: 0;
    line-height: 2;
}

.card-body {
    padding: 20px;
}

.form-group label {
    font-weight: bold;
    margin-bottom: 20px;
}

.form-control {
    border-radius: 5px;
}

.btn-primary {
    background-color: #4CAF50;
    border-color: white;
    border-radius: 5px;
    margin-top: 20px;
    width: 270px;
}

.btn-primary:hover {
    background-color: #212529;
    border-color: #212529;
}

.navbar {
    border-radius: 0;
    height: 56px;
}

.fa-home {
    font-size: 1.3em;
}
</style>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link ml" href="{{route('home')}}">
                        <i class="fa fa-home ml-4"></i> Home <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adminCommande')}}">Toutes les commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('triCommande')}}">Commandes du jour</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('commandeDateForm')}}">Recherche par date</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header text-center">{{ __('Recherche par date') }}</h5>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="jour" class="col-md-4 col-form-label text-md-right">{{ __('Jour') }}</label>
                            <div class="col-md-6">
                                <input id="jour" type="text" class="form-control @error('jour') is-invalid @enderror"
                                    name="jour" value="{{ old('jour') }}" required autocomplete="jour" autofocus>
                                @error('jour')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mois" class="col-md-4 col-form-label text-md-right">{{ __('Mois') }}</label>
                            <div class="col-md-6">
                                <input id="mois" type="text" class="form-control @error('mois') is-invalid @enderror"
                                    name="mois" value="{{ old('mois') }}" required autocomplete="mois">
                                @error('mois')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="année" class="col-md-4 col-form-label text-md-right">{{ __('Année') }}</label>
                            <div class="col-md-6">
                                <input id="année" type="text" class="form-control @error('année') is-invalid @enderror"
                                    name="année" value="{{ old('année') }}" required autocomplete="année">
                                @error('année')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Chercher') }}</button>
                            </div>
                        </div>
                        </from>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection