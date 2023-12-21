<x-layout>
    @section('title')
        Thèmes
    @endsection
    <div>
        <h2>Les thèmes</h2>
        <img class='souligne' src="{{url('storage\images\Vector 7.png')}}">
    </div >
    <h3 class="texte-theme">Explorez un monde infini de possibilités à travers nos romans captivants,<br> où chaque thème est une invitation à l'évasion. Découvrez :</h3>
    <div class="theme">
        @foreach($genres as $theme)
            <a href="{{ route('genres.show', $theme) }}" class="tagtaille">
                <div class="tagdiff">
                    <h5>{{ $theme->label }}</h5>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>

