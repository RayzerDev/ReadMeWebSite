@extends('templates.app')

@section('content')
    @auth
        <h1>Editer un chapitre</h1>
        <form action="{{ route('chapitres.update', $chapitre->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" value="{{ $chapitre->titre }}" id="titre" name="titre">
            </div>

            <div class="form-group">
                <label for="titrecourt">Titre court</label>
                <input type="text" class="form-control" value="{{ $chapitre->titrecourt }}" id="titrecourt" name="titrecourt">
            </div>

            <div class="form-group">
                <label for="texte">Texte</label>
                <textarea class="form-control" id="texte" name="texte" rows="3">{{ $chapitre->texte }}</textarea>
            </div>

            <div class="form-group">
                <label for="media">Media</label>
                <input type="text" class="form-control" value="{{ $chapitre->media }}" id="media" name="media">
            </div>

            <div class="form-group">
                <label for="question">Question</label>
                <textarea class="form-control" id="question" name="question" rows="3">{{ $chapitre->question }}</textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="premier" name="premier" {{ $chapitre->premier ? 'checked' : '' }}>
                <label class="form-check-label" for="premier">Est Premier Chapitre</label>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
            <a href="{{ route('chapitres.show', $chapitre->id) }}" class="btn btn-secondary">Retour</a>
        </form>
    @else
        <h1 style="color: black">Vous n'avez pas accès à cette page</h1>
    @endauth
@endsection
