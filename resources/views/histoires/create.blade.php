<x-layout titre="Créer une histoire">

    <form action="{{ route('histoires.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="titre"><strong>Le titre : </strong></label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}">
        </div>
        <div class="form-group">
            <label for="photo"><strong>La photo: </strong></label>
            <input type="file" name="photo" id="photo">
        </div>
        <div>
            <label for="pitch"><strong>Le pitch: </strong></label>
            <input type="text" class="form-control" id="pitch" name="pitch" value="{{ old('pitch') }}">
        </div>

        <div>
            <button class="btn btn-success" type="submit">Valider</button>
        </div>
    </form>

</x-layout>
