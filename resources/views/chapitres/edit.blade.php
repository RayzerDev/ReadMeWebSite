@extends('templates.app')

@section('content')
    @auth
    <h1>Editer un chapitre</h1>
    <form action="{{ route('chapitre.update', $chapitre->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titrecourt">Titre court</label>
            <input type="text" class="form-control" value="{{$chapitre->titrecourt}}" id="titrecourt" name="titrecourt">
        </div>
            <div class="form-group">
            <label for="texte">Texte</label>
            <textarea class="form-control" id="texte" name="texte" rows="3">{{$chapitre->texte}}</textarea>
        </div>
        <div class="form-group">
            <label for="media">Media</label>
            <input type="text" class="form-control" value="{{$chapitre->media}}" id="media" name="media">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
        <a href="{{route('chapitre.show', $chapitre->id)}}" class="btn btn-secondary">Retour</a>
    </form>
    @else
    <h1>Vous n'avez pas accès à cette page</h1>
    @endauth
@endsection