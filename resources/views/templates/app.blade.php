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
<div class="lignehaut">

<a href="{{route('accueil')}}"><img class="img1" src = "{{url('storage\images\readme_blanc.png')}}"></a>

<nav>
    <a href="{{route('accueil')}}">Accueil</a>
    <a href="{{ route('genres.index') }}">Thèmes</a>
    <a href="{{route('histoires.index')}}">Histoires</a>
    <a href="{{route('equipe.index')}}">Vos histoires</a>
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
<a href="{{route("login")}}"><img class="img2" src = "{{url('storage\images\iconecompte.png')}}"></a>

</div>




<section class="basheader">

<h1>ReadMe, des romans qui <br> brillent dans l'ombre de la nuit.</h1>

<a href=""><button class="butonindex">Passer à la lecture</button></a>


</section>

</header>
<main>
    @yield("content")
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
