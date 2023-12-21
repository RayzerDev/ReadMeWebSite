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
   <div style="display:grid; grid-template-columns: 1fr 1fr;">
       <div>
       <h1>Les chapitres</h1>
           <h2>Créer un chapitre</h2>
           <table>
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

           <form action="{{ route('chapitres.store')}}" method="POST">
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
               <a href="{{route('accueil')}}" class="btn btn-secondary">Retour</a>
           </form>

        @foreach($histoire->chapitres as $c)
        {{$c->id}}: {{$c->titrecourt}} {{$c->question}}
    @endforeach
   </div>
<div>
   <h3>Les liaisons</h3>
</div>

</div>
@endsection