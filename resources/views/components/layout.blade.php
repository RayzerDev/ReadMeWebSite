<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Redacted+Script:wght@400">

    @vite(['resources/css/test-vite.css', 'resources/js/test-vite.js', 'resources/css/app.css'])
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>
<body>

<header>
<nav>
    <a href="{{route('storys.index')}}">Accueil</a>
    <a href="{{route('test-vite')}}">Test Vite</a>
    <a href="{{route('contact')}}">Contact</a>
    <a href="{{route('equipe.index')}}">Equipe</a>
    @auth
        {{Auth::user()->name}}
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
    @else
        <a href="{{route("login")}}">Login</a>
        <a href="{{route("register")}}">Register</a>
    @endauth
</nav>



<section class="basheader">

<h1>teesstt</h1>
<button></button>
</section>

</header>
<main class="main-container">
    {{$slot}}
</main>
<footer>IUT de Lens</footer>
</body>
</html>
