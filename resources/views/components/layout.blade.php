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

<a href="{{route('accueil')}}"><img class="img1" src = "{{url('storage\images\readme.png')}}"></a>

<nav>
    <a href="{{route('accueil')}}">Accueil</a>
    <a href="#">Thèmes</a>
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






<main class="main-container">
   






{{$slot}}

</main>

</body>
</html>
