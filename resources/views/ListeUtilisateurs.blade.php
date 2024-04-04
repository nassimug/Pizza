@extends('trame.app')

@section('title','Liste utilisateurs')

@section('contenu')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
.table-commandes {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
}

.table-commandes td,
.table-commandes th {
    border: 1px solid #ddd;
    padding: 8px;
}

.table-commandes tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-commandes th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

.table-commandes a {
    color: #4CAF50;
    text-decoration: none;
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
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link ml" href="{{route('home')}}">
                        <i class="fa fa-home ml-4"></i> Home <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</body>
<h2 class="text-center mb-4">Liste de tous les comptes admin et cook :</h2>
<table class="table-commandes" style="width: 25%; margin: 0 auto; margin-top: 35px;">
    <tr>
        <th nowrap class="text-center">Nom</th>
        <th nowrap class="text-center ">Prénom</th>
        <th nowrap class="text-center">Type</th>
        <th nowrap class="text-center">Suppression</th>
    </tr>
    @foreach ($users as $user)
    @if ($user->type === 'admin' || $user->type === 'cook')
    <tr>
        <td nowrap class="text-center">{{ $user->nom }}</td>
        <td nowrap class="text-center">{{ $user->prenom }}</td>
        <td nowrap class="text-center">{{ $user->type }}</td>
        <td nowrap class="text-center">
            <form action="{{ route('users.delete', $user->id) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
            </form>
        </td>
    </tr>
    @endif
    @endforeach
</table>
<div class="d-flex justify-content-center" style="margin-top: 50px;">
    @empty($noPaginate)
    {{$users->links()}}
    @endempty
</div>
@endsection