<x-layout titre="Le détail d'une histoire">
    <h1>Le détail d'une histoire</h1>
    <div>
        <p><strong>Le nom de la histoire :</strong> {{ $histoire->titre }}</p>
        <img src="{{$histoire->photo}}">
        <p>
            <strong>Pitch:</strong> {{ $histoire->pitch }}<br>
        <form method="POST" action="{{ route('active.toggle', ['histoire' => $histoire->id]) }}">
            @csrf
            @method('PUT')

            <input type="checkbox" name="active" {{ $histoire->active ? 'checked' : '' }}>
            <label for="favoriCheckbox">Active</label>

            <button type="submit">Enregistrer</button>
        </form>--}}
            <strong>Le nombre de lecture terminée:</strong> {{ $terminee }}<br>
            <strong>Le nombre d'avis positif:</strong> {{ $nbAvisPos }}<br>
            <strong>Ecrit par :</strong> {{ $auteur }}<br>
        </p>
        <button><a href="{{route('chapitres.show')}}">Commencer à lire</a></button>
    </div>
</x-layout>
