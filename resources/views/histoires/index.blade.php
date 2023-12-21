<x-layout>
    @section('title')
        Histoires
    @endsection
    <div class='coups2coeur'>
        <h1>Vos coups de coeur</h1>
        <img class='souligne' src="{{url('storage\images\Vector 7.png')}}">
        @auth<button><a href="{{route('histoires.create')}}">Créer une histoire</a></button>@endauth
        <p> <strong>Trier par genre</strong>
        <form action="{{ route('histoires.index') }}" method="get" id="filterForm">
            <div class="input-genre">
                <div class="mb-3">
                    <select name="genre" class="form-select form-control bg-white" onchange="document.getElementById('filterForm').submit(); return false;">
                        <option value="All" @if($genre == 'All') selected @endif>-- Tout les genres --</option>
                        @foreach($genres as $genreOption)
                            <option value="{{ $genreOption->id }}" @if($genre == $genreOption->id) selected @endif>
                                {{ $genreOption->label }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        </p>
        <div class='wraper'>
            <div class='caroussel'>
            @foreach ($histoires as $histoire)
                @if($histoire->active)
                    <a href="{{ route('histoires.show', $histoire) }}">
                        <div>
                            <img src="{{$histoire->photo}}">
                            <h5>{{ $histoire->titre }}</h5>
                        </div>
                    </a>
                @endif
            @endforeach
            </div>
        </div>
    </div>
</x-layout>

