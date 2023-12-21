<x-layout>
    <div class="container">
        <h1>{{ $equipe['nomEquipe'] }}</h1>
        <img src="{{ Vite::asset($equipe['logo']) }}" alt="Logo">

        <p><strong>Slogan:</strong> {{ $equipe['slogan'] }}</p>
        <p><strong>Localisation:</strong> Salle {{ $equipe['localisation'] }}</p>

        <h2>Membres de l'équipe:</h2>
        <ul>
            @foreach($equipe['membres'] as $membre)
                <li>
                    <img src="{{ "storage/" . $membre['image'] }}" alt="{{ $membre['nom'] }} {{ $membre['prenom'] }}">
                    <p><strong>Nom:</strong> {{ $membre['nom'] }} {{ $membre['prenom'] }}</p>
                    <p><strong>Fonctions:</strong> {{ implode(', ', $membre['fonctions']) }}</p>
                </li>
            @endforeach
        </ul>

        <p><strong>Autres:</strong> {{ $equipe['autres'] }}</p>
    </div>
</x-layout>