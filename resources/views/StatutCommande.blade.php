@extends('trame.app')

@section('title', 'Statut de commande')

@section('contenu')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="bootstrap.bundle.min.js / bootstrap.bundle.js">

<style>
.table {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 80%;
    margin: 50px auto 20px auto;
    background-color: #fff;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);

}

.table td,
.table th {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
    font-size: 16px;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table th {
    background-color: #4CAF50;
    color: white;
}

.table a {
    color: #fff;
    text-decoration: none;
    margin-top: 5px;
    padding: 8px 16px;
    border-radius: 4px;
    background-color: #4CAF50;
    transition: all 0.3s ease;
}

.table a:hover {
    background-color: #3e8e41;
}

.container {
    max-width: 600px;
    margin: 0 auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.col-md-8 {
    flex-basis: 100%;
    max-width: 100%;
}

h2 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 20px;
    text-align: center;
    color: #4CAF50;
}

p {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    text-align: center;
}

.btn-secondary {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    color: #fff;
    background-color: #5a6268;
    border-color: #545b62;
}

.mt-3 {
    margin-top: 20px;
}

.btn {
    width: 150px;
}

.container {
    margin-top: 20px;
    margin-left: 200x;
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
                        <a class="nav-link center ml-2" href="{{route('cook')}}">
                            <i class="fa fa-home"></i> <span style="font-size: 16px;">Home</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Statut de la commande n°{{$id}}</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>

                            <td><a href="{{route('statutModif', ['id'=>$id,'statut'=>'envoye'])}}" class="btn
                        btn-primary">Envoyé</a></td>
                        </tr> --}}
                        <tr>
                            <td><a href="{{route('statutModif', ['id'=>$id,'statut'=>'traitement'])}}"
                                    class="btn btn-primary">En traitement</a></td>
                        </tr>
                        <tr>
                            <td><a href="{{route('statutModif', ['id'=>$id,'statut'=>'pret'])}}"
                                    class="btn btn-primary">Prête</a></td>
                        </tr>
                        <tr>
                            <td><a href="{{route('statutModif', ['id'=>$id,'statut'=>'recupere'])}}"
                                    class="btn btn-primary">Récupérée</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="{{route('home')}}" class="btn btn-secondary mt-3">Retour</a>
            </div>
        </div>
    </div>
</div>
@endsection