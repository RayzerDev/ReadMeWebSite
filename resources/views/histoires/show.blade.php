<x-layout titre="Le détail d'une histoire">
    <h1>Le détail d'une histoire</h1>
    <div>
        <p><strong>Le nom de la histoire :</strong> {{ $histoire->titre }}</p>
        <img src="{{ url($histoire->photo) }}">
        <p>
            <strong>Pitch:</strong> {{ $histoire->pitch }}<br>
            <strong>Le nombre de lecture terminée:</strong> {{ $histoire->terminee }}<br>
            <strong>Le nombre d'avis:</strong> {{ $histoire->avis->count() }}<br>
            <strong>Ecrit par :</strong> <a href="{{route("user.show",[$histoire->user])}}">{{ $histoire->user->name }}</a><br>
        </p>
        <button class='bouton'><a href="{{route('chapitres.show', $histoire->chapitres->where("premier", true)->first())}}">Commencer à lire</a></button>
    </div>
    <div>
        @forelse($histoire->avis as $avis)
            <div class="d-flex flex-start mt-4">
                <div class="flex-grow-1 flex-shrink-1">
                    <div>
                        <img class="img2" src = "{{url('storage\images\iconecompte.png')}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                                {{$avis->user->name}}
                            </p>
                            @auth
                                @if(auth()->user() && auth()->user()->id === $avis->user->id)
                                    <div class="btn-group" role="group" aria-label="Options">
                                        <a class="btn btn-sm btn-secondary" href="{{ route('avis.edit', ['avi' => $avis]) }}">Modifier</a>
                                        <form method="post" action="{{ route('avis.destroy', ['avi' => $avis]) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        <p class="small mb-0">
                            {{$avis->contenu}}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p>Pas de commentaire.</p>
        @endforelse
    </div>
    @auth
        <div class="mt-4">
            <h3>Ajouter un avis:</h3>
            <form method="post" action="{{ route('avis.store', ["histoire" => $histoire]) }}">
                @csrf
                <textarea class="form-control mb-3 bg-white" name="contenu" rows="4" placeholder="Votre avis"></textarea>
                <button type="submit" class="btn btn-primary">Ajouter l'avis</button>
            </form>
        </div>
    @endauth
</x-layout>
