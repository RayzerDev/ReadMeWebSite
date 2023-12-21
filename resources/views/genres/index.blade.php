<x-layout>
    @section('title')
        Thèmes
    @endsection
    <div>
        <h2>Les thèmes</h2>
        <img class='souligne' src="{{url('storage\images\Vector 7.png')}}">
    </div>
    <div>
        @foreach($genres as $theme)
            <a href="{{ route('genres.show', $theme) }}">
                <div>
                    <h5>{{ $theme->label }}</h5>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>

