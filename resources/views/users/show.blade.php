<x-layout>
    <h1>Page personnel de {{$user->name}}</h1>
    <div class="container">
        @auth
        @if (Auth::user()->id === $user->id)
            <div class="container">
                <h2>Mes lectures en cours</h2>
                <div>
                    @forelse($user->lectures as $histoire)
                        <div class="card">
                            <p>{{$histoire->titre}}</p>
                            <p>{{$histoire->pitch}}</p>
                            <img src="{{url($histoire->photo)}}"/>
                            <a href="{{route("histoires.show", $histoire)}}">Voir l'histoire</a>
                        </div>
                    @empty
                        <p>Pas de lecture en cours</p>
                    @endforelse
                </div>
            </div>
        @endif
        @endauth
        <div class="container">
            <h2>Ses histoires</h2>
            @forelse($user->mesHistoires as $histoire)
                <div class="card">
                    <img src="{{url($histoire->photo)}}" alt="Image histoire"/>
                    <p>{{$histoire->titre}}</p>
                    <p>{{$histoire->pitch}}</p>
                    <p>{{$histoire->active ? "Active" : "Non active"}}</p>
                    <a href="{{route("histoires.show", $histoire)}}">Voir l'histoire</a>
                </div>
            @empty
                <p>Aucune histoire créées.</p>
            @endforelse
        </div>
        <div>
        <h2>Ses lectures terminées</h2>
            @if ($user->lectures->isNotEmpty())
                <ul>
                    @foreach ($user->terminees as $histoire)
                        <li>
                            <strong>{{ $histoire->titre }}</strong>
                            <p>Nombre de lectures terminées : {{ $histoire->pivot->nombre}}</p>
                            <a href="{{route("histoires.show", $histoire)}}">Voir l'histoire</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucune histoire lue pour le moment.</p>
            @endif
        </div>
        <div>
            <h2>Ses avis</h2>
            @if ($user->avis->isNotEmpty())
                <ul>
                    @foreach ($user->avis as $avis)
                        <li>
                            <strong>{{ $avis->histoire->titre }}</strong>
                            <p>{{ $avis->contenu}}</p>
                            <a href="{{route("histoires.show", $avis->histoire)}}">Voir l'histoire</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucun avis donné.</p>
            @endif
        </div>
    </div>
</x-layout>