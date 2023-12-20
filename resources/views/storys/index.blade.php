
<x-layout titre="Liste des Histoires">
    <div>
        <h1>Liste des Histoires</h1>
        <p> <strong>Trier par genre</strong>
        <form action="{{route('storys.index')}}" method="get" id="filterForm">
            <div class="input-genre">
                <div class="mb-3">
                    <select name="genre" class="form-select form-control bg-white">
                        <option value="All" @if($genre == 'All') selected @endif>-- Tout les genres --</option>
                        @foreach($genres as $genreOption)
                            <option value="{{ $genreOption }}" @if($genre == $genreOption) selected @endif>{{ $genreOption }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" value="OK">
        </form>
        </p>
        <div>
            @foreach ($histoires as $histoire)
                @if($histoire->active)
                    <a href="{{ route('storys.show', $histoire->id) }}">
                        <div>
                            <img src="{{$histoire->photo}}">
                            <h5>{{ $histoire->titre }}</h5>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</x-layout>

