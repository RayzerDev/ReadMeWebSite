<x-layout titre="Créer une histoire">


<h2> Créer une histoire </h2> 
<img class='souligne' src="{{url('storage\images\Vector 7.png')}}">

<div class="form5"
<div class="formcreer">
    <form action="{{ route('histoires.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="titre"><strong class="couleur">Le titre : </strong></label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}">
        </div>
        <div class="form-group">
            <label for="photo"><strong class="couleur">La photo: </strong></label>
            <input type="file" name="photo" id="photo">
        </div>
        <div>
            <label for="pitch"><strong class="couleur">Le pitch: </strong></label>
            <input type="text" class="form-control" id="pitch" name="pitch" value="{{ old('pitch') }}">
        </div>

        <div>
            <button class="btn btn-success" type="submit" id="valider">Valider</button>
        </div>
    </form>
</div>
</div>
</x-layout>
