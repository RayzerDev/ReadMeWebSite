@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@extends('templates.app')

 @section('content')
     @auth
         <h1>Créer un chapitre</h1>
         <form action="{{ route('chapitre.store'}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="form-group">
                 <label for="titre">Titre</label>
                 <input type="text" class="form-control" placeholder="un titre" id="titre" name="titre">
             </div>

             <div class="form-group">
                 <label for="titrecourt">Titre court</label>
                 <input type="text" class="form-control" id="titrecourt" name="titrecourt">
             </div>

             <div class="form-group">
                 <label for="texte">Texte</label>
                 <textarea class="form-control" id="texte" name="texte" rows="3">le chapitre . . .</textarea>
             </div>
             <div class="form-group">
                 <label for="media">Media</label>
                 <input type="text" class="form-control" value="{{$chapitre->media}}" id="media" name="media">
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