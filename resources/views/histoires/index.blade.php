<x-layout>
    @section('title')
        Histoires
    @endsection
    <div class='coups2coeur'>
        <h2 class="c2c">Histoires</h2>
        <img class='souligne' src="{{url('storage\images\Vector 7.png')}}">

        <h3>Nouveautés</h3>

        <div class="news">
            <div class="d1">
                <img src="https://i.pinimg.com/564x/d3/b8/4c/d3b84c4b0edc002b3ba42aee665354b9.jpg"/>
                <a href="" class=tag>policier</a>
            </div>
            <div class="d1">
                <img src="https://i.pinimg.com/564x/e2/3f/25/e23f25663790da1dc1d799696647e996.jpg"/>
                <a href="" class="tag2">fantastique</a>
            </div>
            <div class="d1">
                <img src="https://i.pinimg.com/564x/13/fe/11/13fe11fc6686fdb837b3ff71547cbc67.jpg"/>
                <a href="" class="tag">psychologique</a>
            </div>
            <div class="d1">
                <img src="https://i.pinimg.com/736x/d0/77/a8/d077a89e965e57f0cdd8f5c877fcb595.jpg"/>
                <a href="" class="tag2">horreur</a>
            </div>
        </div>

        @auth<button><a href="{{route('histoires.create')}}">Créer une histoire</a></button>@endauth
        <h3> <strong>Trier par genre</strong></h3>
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

            <div class='caroussels'>
            @foreach ($histoires as $histoire)

                @if($histoire->active)
                <div class="hiistoires">
                    <a href="{{ route('histoires.show', $histoire) }}">
                        <div>
                            <img src="{{ url($histoire->photo) }}">
                            <h5>{{ $histoire->titre }}</h5>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach

            </div>
        </div>

</x-layout>

