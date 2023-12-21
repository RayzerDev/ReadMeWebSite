@extends('templates.app')

@section('content')
    <div>
        <h1>{{$chapitre->titrecourt}}</h1>
        <img src="{{$chapitre->media}}" alt="photo_chapitre">
        <p>
            {{ $chapitre->texte }}<br>
        </p>
    <ul>
        @foreach($chapitre->suivants as $c)
             <li>
                 <a href="{{route('chapitres.show', $c->pivot->chapitre_destination_id)}}">{{$c->pivot->reponse}}</a>
             </li>
        @endforeach
    </ul>
        <ul>
            <strong>Page visitée :</strong>
            @forelse($en_cour as $act)
                <li>
                    <p>{{ $act }}</p>
                </li>
            @empty
                <li>
                    <p>Aucun chapitre en cours.</p>
                </li>
            @endforelse
        </ul>

        <a href="{{route('chapitres.edit', $chapitre->id)}}">Editer le chapitre</a>
        <a href="{{route('histoires.encours', $chapitre->histoire_id)}}">Revenir à l'histoire</a>
        <form method="post" action="{{ route('chapitres.destroy', ['chapitre' => $chapitre]) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
        </form>
    </div>
@endsection
