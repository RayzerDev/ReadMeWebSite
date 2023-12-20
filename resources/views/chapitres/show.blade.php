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
@endsection
