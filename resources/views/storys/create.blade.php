<x-layout titre="Créer une histoire">

    <form action="{{ route('storys.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="titre"><strong>Le titre : </strong></label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}">
        </div>
        <div>
            <label for="photo"><strong>La photo : </strong></label>
            <input type="text" class="form-control" id="photo" name="photo" value="{{ old('photo') }}">
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
