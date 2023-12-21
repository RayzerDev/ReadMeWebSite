<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>



<nav>
    
    <a href="{{route('accueil')}}">Accueil</a>
    <a href="{{route('histoires.index')}}">Histoires</a>
    <a href="#">Contact</a>
    <a href="{{route('equipe.index')}}">Equipe</a>

@auth
        {{Auth::user()->name}}
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
        <a href="{{route('histoires.create')}}">Nouvelle histoire</a>
    @endauth
</nav>


</header>
<main>
    @yield("content")


</main>

<footer>IUT de Lens</footer>
</body>
</html>
