<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main>
    <div style="font-size: larger; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; background-color: #A62FDD; color: #E9E9E9 ">
        <p>Error 404 - Tu t'écartes de ton chemin !!</p>
        <button style="margin-top: 10px;"><a href="{{ route('accueil') }}"> Retourne à l'accueil</a></button>
    </div>


</main>

</body>
</html>
