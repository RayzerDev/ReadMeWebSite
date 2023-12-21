@extends('templates.app')


@section('content')
    <h1>Histoire {{$histoire->titre}}</h1>
    <div>
        <form method="POST" action="{{ route('active.toggle',  ['histoire' => $histoire]) }}">
            @csrf
            @method('PUT')

            <input type="checkbox" name="active" {{ $histoire->active ? 'checked' : '' }}>
            <label for="favoriCheckbox">Active</label>

            <button type="submit">Enregistrer</button>
        </form>       <a href="{{route('histoires.show', $histoire)}}" class="btn btn-secondary">Retour</a>


    </div>
   <div class="titrecrea">
   <h1>Les chapitres</h1>
       <div class="tablecrea">
      
           <h2>Créer un chapitre</h2>
           <table >
               <thead>
               <tr>
                   <th>ID</th>
                   <th>Titre court</th>
                   <th>Question</th>
                   <th>Voir</th>
               </tr>
               </thead>
               <tbody>
               @foreach($histoire->chapitres as $c)
                   <tr>
                       <td>{{ $c->id }}</td>
                       <td>{{ $c->titrecourt }}</td>
                       <td>{{ $c->question }}</td>
                       <td><a href="{{route('chapitres.show', $c)}}">Visualiser</a></td>
                   </tr>
               @endforeach
               </tbody>
           </table>

           <form action="{{ route('chapitres.store')}}" method="POST"  class="formcrea1">
               @csrf
               <input type="hidden" value="{{$histoire->id}}" name="histoire_id">
               <div class="form-group">
                   <label for="titre">Titre</label>
                   <input type="text" class="form-control" value="{{old('titre')}}" placeholder="un titre" id="titre" name="titre">
               </div>

               <div class="form-group">
                   <label for="titrecourt">Titre court</label>
                   <input type="text" class="form-control" value="{{old('titrecourt')}}" id="titrecourt" name="titrecourt">
               </div>

               <div class="form-group">
                   <label for="texte">Texte</label>
                   <textarea class="form-control" id="texte" name="texte" rows="3" value="{{old('texte')}}"></textarea>
               </div>
               <div class="form-group">
                   <label for="question">Question</label>
                   <input type="text" class="form-control" id="question" name="question" rows="3" value="{{old("question")}}">
               </div>
               <div class="form-group">
                   <label for="media">Media</label>
                   <input type="text" class="form-control" id="media" value="{{old('media')}}" name="media">
               </div>
               <div class="form-group">
                   <label for="premier">Premier chapitre</label>
                   <input type="checkbox" class="form-control" id="premier" name="premier">
               </div>
               <button type="submit" class="btn btn-primary">Valider</button>
           </form>
   </div>
<div class="titrecrea">
   <h1>Les liaisons</h1>
    <form action="{{ route('liaisons.store')}}" method="POST" class="formcrea">
        @csrf
        <label for="choix">Source :</label>
        <select id="source" name="source">
            @foreach($histoire->chapitres as $c)
                <option value="{{ $c->id  }}">{{ $c->id . " : " . $c->titrecourt}}</option>
            @endforeach
        </select>
        <label for="choix">Destination :</label>
        <select id="destination" name="destination">
            @foreach($histoire->chapitres as $c)
                <option value="{{ $c->id  }}">{{ $c->id . " : " . $c->titrecourt}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="reponse">Réponse</label>
            <input type="text" class="form-control" id="reponse" name="reponse" rows="3" value="{{old("reponse")}}">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>Source</th>
            <th>Réponse</th>
            <th>Destination</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        @forelse($histoire->chapitres as $source)
            @forelse($source->suivants as $destination)
            <tr>
                <td>{{ $source->id . $source->titrecourt }}</td>
                <td>{{ $destination->pivot->reponse }}</td>
                <td>{{ $destination->id . $destination->titrecourt }}</td>
                <td><form method="post" action="{{ route('liaisons.delete') }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{$source->id}}" name="source">
                        <input type="hidden" value="{{$destination->id}}" name="destination">
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button></form></td>
            </tr>
            @empty
            @endforelse
        @empty
        @endforelse
        </tbody>
    </table>
</div>
</div>
@endsection