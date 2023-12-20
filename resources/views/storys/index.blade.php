
<x-layout titre="Liste des Histoires">
    <div>
        <h1>Liste des Histoires</h1>
        {{--<form action="{{route('scenes.index')}}" method="get" id="filterForm">
            <div class="input-group">
                <div class="mb-3">
                    <select name="cat" class="form-select form-control bg-white" onchange="submitForm()">
                        <option value="All" @if($cat == 'All') selected @endif>-- Toutes équipes --</option>
                        @foreach($equipes as $equipe)
                            <option value="{{$equipe}}" @if($cat == $equipe) selected @endif>{{$equipe}}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('scenes.index', ['recent' => 1]) }}" class="custom-button text-decoration-none d-flex align-items-center">Les 5 + récents</a>
                <a href="{{ route('scenes.index', ['top_rated' => 1]) }}" class="custom-button text-decoration-none d-flex align-items-center">Les 5 + notées</a>
            </div>
        </form>--}}

        <div>
            @foreach ($histoires as $histoire)
                <a href="{{ route('storys.show', $histoire->id) }}">
                    <div>
                        <h5>{{ $histoire->nom }}</h5>
                        <p>
                            <strong>Équipe:</strong> {{ $scene->equipe }}<br>
                            <strong>Date d'Ajout:</strong> {{ $scene->created_at }}<br>
                            @if(isset($scene->average_rating) && $scene->average_rating > 0)
                                <strong>Note moyenne:</strong> {{ $scene->average_rating }}<br>
                            @endif
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>

