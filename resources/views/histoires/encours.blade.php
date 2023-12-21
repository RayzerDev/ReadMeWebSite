@extends('templates.app')


@section('content')
    <h1>Histoire {{$histoire->titre}}</h1>
   <div style="display:grid; grid-template-columns: 1fr 1fr;">
       <div>
       <h3>Les chapitres</h3>
           <h1>Créer un chapitre</h1>
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
                   <textarea class="form-control" id="texte" name="texte" rows="3" PLACEHOLDER="le chapitre . . ."></textarea>
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