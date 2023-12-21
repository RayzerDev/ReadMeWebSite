<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Redacted+Script:wght@400">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@600&display=swap" rel="stylesheet">

    @vite(['resources/css/test-vite.css', 'resources/js/test-vite.js', 'resources/css/app.css'])
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>
<body>

<header>
<div class="lignehaut">

<a href="{{route('storys.index')}}"><img src = "{{url('storage\images\readme.png')}}"></a>
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

<a href="{{route('storys.index')}}"><img src = "{{url('storage\images\iconecompte.png')}}"></a>
</div>




<section class="basheader">



</section>

</header>
<main class="main-container">
    {{$slot}}
</main>
<footer>
    <div>
        <h2>Pages</h2>
        <a href="">Accueil</a>
        <a href="">Thèmes</a>
        <a href="">Histoires</a>
        <a href="">Connexion</a>
    </div>
    <div>
        <h2>Contacts</h2>
        <a href="">Instagram</a>
        <a href="">Facebook</a>
        <a href="">Twitter</a>
        <a href="">Linkedin</a>
    </div>
    <div>
        <h2>Confidentialité</h2>
        <a href="">Conditions générales</a>
        <a href="">Vie privée</a>
        <a href="">Mentions légales</a>
        <a href="">Données personnelles</a>
    </div>
    <div>
        <h2>Newsletter</h2>
        <a href="{{route('storys.index')}}"><img src = "{{url('storage\images\readme_blanc.png')}}"></a>
        <div>
            <input type="mail"/>
            <button>></button>
        </div>
    </div>
</footer>
</body>
</html>
