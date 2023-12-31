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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    @vite(['resources/css/test-vite.css', 'resources/js/test-vite.js', 'resources/css/app.css'])
    <title>@yield('title')</title>
</head>
<body>

<header>
<div class="lignehaut">

<a href="{{route('accueil')}}"><img class="img1" src = "{{url('storage\images\readme_blanc.png')}}"></a>

<nav>
    <a href="{{route('accueil')}}">Accueil</a>
    <a href="{{ route('genres.index') }}">Thèmes</a>
    <a href="{{route('histoires.index')}}">Histoires</a>
    @auth
        <a href="{{ route('histoires.create') }}">Nouvelle histoire</a>
    @endauth
</nav>
@auth
    <a href="{{route("user.show", Auth::user())}}"><img class="img2" src = "{{url('storage\images\iconecompte.png')}}"></a>
    <a href="{{route("logout")}}"
       onclick="document.getElementById('logout').submit(); return false;">Logout</a>
    <form id="logout" action="{{route("logout")}}" method="post">
        @csrf
    </form>
@endauth
    @guest
        <a href="{{route("login")}}"><img class="img2" src = "{{url('storage\images\iconecompte.png')}}"></a>
    @endguest
</div>




<section class="basheader">

<h1>ReadMe, des romans qui <br> brillent dans l'ombre de la nuit.</h1>

<a href=""><button class="butonindex">Passer à la lecture</button></a>


</section>

</header>






<main class="main-container">







{{$slot}}




</main>

<footer>
    <div class=" footer-taille">
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
    <div >
        <h2>Newsletter</h2>
        <a href="{{route('histoires.index')}}"><img src = "{{url('storage\images\readme_blanc.png')}}"></a>
        <div class="newsletter">
            <input type="mail" />
            <button class="newsletterbutton">></button>
        </div>
    </div>
    </div>
</footer>

</body>
</html>
