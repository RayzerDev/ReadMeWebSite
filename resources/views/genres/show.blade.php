<x-layout titre="Le détail d'une histoire">
    <h1 class="titregenre">La liste des histoires dans le genre {{ $genre->label }}</h1>
    <img class='souligne' src="{{url('storage\images\Vector 7.png')}}">
    <div class="histoiregenre">
        @foreach($histoires as $histoire)
        <div class="genreboucleshow">
            <p><strong>Le nom de la histoire :</strong> {{ $histoire->titre }}</p>
            <img src="{{url($histoire->photo)}}">
            <p>
                <strong>Pitch:</strong> {{ $histoire->pitch }}<br>
                </p>
        </div>
        @endforeach
            
    </div>
</x-layout>
