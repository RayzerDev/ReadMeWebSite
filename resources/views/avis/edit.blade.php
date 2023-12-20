<x-layout>
    <div class="container">
        <h1>Modifier un avis</h1>

        <!-- Afficher les erreurs de validation s'il y en a -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire de modification d'avis -->
        <form method="POST" action="{{ route('avis.update', ['avi' => $avi->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="contenu">Contenu de l'avis :</label>
                <textarea name="contenu" id="contenu" class="form-control" rows="5">{{ $avi->contenu }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modifier l'avis</button>
        </form>
    </div>
</x-layout>