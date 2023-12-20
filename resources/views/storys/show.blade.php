<x-layout titre="Le détail d'une histoire">
    @auth
        <div>
            <h1 class="text-center">Le détail d'une histoire</h1>
            <div class="container mt-5">
                <p><strong>Le nom de la histoire :</strong> {{ $histoire['nom'] }}</p>
                <form method="POST" action="{{ route('favoris.toggle', ['histoire' => $histoire->id]) }}" class="text-center">
                    @csrf
                    @method('PUT')

                    <input type="checkbox" name="favori" {{ $isFavorite ? 'checked' : '' }}>
                    <label for="favoriCheckbox">Favori</label>

                    <button type="submit">Enregistrer</button>
                </form>

                <form action="{{ route('notes.store') }}" method="post" class="text-center mt-5">
                    @csrf
                    <input type="hidden" name="idhistoire" value="{{ $histoire->id }}">
                    <label for="note">Donner une note:</label>
                    <input type="number" name="note" min="0" max="5" required>
                    <button type="submit">Enregistrer</button>
                </form>
                @if (App\Models\Note::where('idUser', Auth::user()->id)->count() > 0)
                    <h3 class="text-center">Votre note:</h3>
                    <p class="text-center">Vous avez donné une note de {{ App\Models\Note::where('idUser', Auth::user()->id)->first()->note }}.</p>

                @else
                    <p class="text-center fst-italic">Vous n'avez pas encore noté cette histoire.</p>
                @endif

                <p><strong>la description de la histoire:</strong><pre><code>{!! $histoire->format !!}</code></pre></p>
                <p><strong>La date d'ajout :</strong> {{ $histoire['created_at'] }}</p>
                <p><strong>L'équipe :</strong> {{ $histoire['equipe'] }}</p>
                <p><strong>La description de la histoire :</strong> {!! $parseDown->parse($histoire['description']) !!}</p>
                <img src="{{ asset('storage/'.$histoire['image']) }}" alt="Image de la scène">
            </div>
            <div class="container">
                <x-stats>
                    <x-slot name="noteMoy">
                        {{ $moyNote}}
                    </x-slot>
                    <x-slot name="noteMax">
                        {{ $maxNote }}
                    </x-slot>
                    <x-slot name="noteMin">
                        {{ $minNote }}
                    </x-slot>
                    <x-slot name="nbNotes">
                        {{ $nbNotes }}
                    </x-slot>
                    <x-slot name="nbfav">
                        {{ $nbFav }}
                    </x-slot>
                </x-stats>
                <p>l'image de la scène :<img src="{{ asset('storage/'.$histoire['photo']) }}" alt="Image de la scène"></p>
                <p><strong>la note moyenne de la scène :</strong> {{ \App\Models\Note::where('idhistoire', $histoire['id'])->avg('note') }}</p>
                <p class="text-center"><strong>Les commentaires :</strong> </p>
                @foreach($commentaires as $comment)
                    <div>
                        <p class="p-2">Le titre :{{$comment['titre']}}</p>
                        {{ $comment['corp'] }}
                    </div>
                @endforeach
            </div>
            @endauth
            @guest
                <div class="container mt-5 rounded-4">
                    <h1 class="text-center">Le détail d'une histoire</h1>
                    <div class="container mt-5">
                        <h1>Le détail d'une histoire</h1>

                        <p><strong>Le nom de la histoire :</strong> {{ $histoire['nom'] }}</p>
                        <p><strong>la description :</strong>{{ $histoire['description'] }}</p>
                        <p><strong>La date d'ajout :</strong> {{ $histoire['created_at'] }}</p>
                        <p><strong>l'équipe :</strong> {{ $histoire['equipe'] }}</p>
                        <p><strong>la description de la histoire :</strong> {!! $parseDown->parse($histoire['format']) !!}</p>
                    </div>
                    <div class="container">
                        <x-stats>
                            <x-slot name="noteMoy">
                                {{ $moyNote}}
                            </x-slot>
                            <x-slot name="noteMax">
                                {{ $maxNote }}
                            </x-slot>
                            <x-slot name="noteMin">
                                {{ $minNote }}
                            </x-slot>
                            <x-slot name="nbNotes">
                                {{ $nbNotes }}
                            </x-slot>
                            <x-slot name="nbfav">
                                {{ $nbFav }}
                            </x-slot>
                        </x-stats>
                    </div>
                    <p><strong>Le nom de la histoire :</strong> {{ $histoire['nom'] }}</p>
                    <p><strong>la description :</strong>{{ $histoire['description'] }}</p>
                    <p><strong>La date d'ajout :</strong> {{ $histoire['created_at'] }}</p>
                    <p><strong>l'équipe :</strong> {{ $histoire['equipe'] }}</p>
                    <p><strong>la description de la histoire :</strong> {!! $parseDown->parse($histoire['description']) !!}</p>
                    <p>l'image de la scène :<img src="{{ asset('storage/'.$histoire['image']) }}" alt="Image de la scène" class="w-25"></p>
                    <p>l'image de la vignette :<img src="{{ asset('storage/'.$histoire['vignetteImage']) }}" alt="Vignette de la scène" class="w-25"></p>
                    <p><strong>la note moyenne de la scène :</strong> {{ \App\Models\Note::where('idhistoire', $histoire['id'])->avg('note') }}</p>
                    <div class="container">
                        <p class="text-center"><strong>Les commentaires :</strong> </p>
                        @foreach($commentaires as $comment)
                            <div>
                                <p class="p-3">Le titre :{{$comment['titre']}}</p>
                                {{ $comment['corp'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
    @endguest
</x-layout>