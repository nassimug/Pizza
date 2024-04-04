<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
    .etat {
        color: black;
        text-align: center;
        font-size: 30px;
        background-color: #A5ECFF;
        margin-bottom: 0px;
    }

    .hidden {
        display: none;
    }
    </style>
</head>

<body>
    <div id="etat">
        @if (session()->has('etat'))
        <p class="etat ">{{ session()->get('etat') }}</p>
        @endif
    </div>


    @if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @yield('contenu')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script>
    // Récupérer l'élément contenant l'état
    var etat = document.getElementById('etat');

    // Masquer l'élément après 2 secondes
    setTimeout(function() {
        etat.classList.add('hidden');
    }, 2000);
    </script>

</body>

</html>